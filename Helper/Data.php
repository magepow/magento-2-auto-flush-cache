<?php
/**
 * @Author: nguyen
 * @Date:   2020-02-12 14:01:01
 * @Last Modified by:   Alex Dong
 * @Last Modified time: 2021-05-17 10:51:42
 */

namespace Magepow\AutoFlushCache\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @var array
     */
    protected $configModule;

    /**
     * @var \Magento\Framework\App\Cache\TypeListInterface
     */
    protected $cacheTypeList;

    /**
     * @var \Magento\Framework\App\Cache\Manager
     */
    protected $cacheManager;

    /**
     * @var \Magento\Framework\App\CacheInterface
     */
    protected $cache;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\App\Cache\Manager $cacheManager,
        \Magento\Framework\App\CacheInterface $cache
    )
    {
        parent::__construct($context);

        $this->cacheTypeList = $cacheTypeList;
        $this->cacheManager = $cacheManager;
        $this->cache = $cache;
        $this->configModule = $this->getConfig(strtolower($this->_getModuleName()));
    }

    public function getConfig($cfg='')
    {
        if($cfg) return $this->scopeConfig->getValue( $cfg, \Magento\Store\Model\ScopeInterface::SCOPE_STORE );
        return $this->scopeConfig;
    }

    public function getConfigModule($cfg='', $value=null)
    {
        $values = $this->configModule;
        if( !$cfg ) return $values;
        $config  = explode('/', $cfg);
        $end     = count($config) - 1;
        foreach ($config as $key => $vl) {
            if( isset($values[$vl]) ){
                if( $key == $end ) {
                    $value = $values[$vl];
                }else {
                    $values = $values[$vl];
                }
            } 

        }
        return $value;
    }

    /**
     * Flush specific cache types intelligently
     * Only invalidates the specified cache types without full backend clean
     *
     * @param array $types Cache types to flush
     * @return void
     */
    public function flushCache($types = [])
    {
        if (!$this->getConfigModule('general/enabled')) {
            return;
        }

        if (empty($types)) {
            $types = $this->getConfigModule('general/type');
            if (!$types) {
                return;
            }
            $types = explode(',', $types);
        }

        // Clean only specified cache types - uses Magento's intelligent invalidation
        foreach ($types as $type) {
            $type = trim($type);
            if ($type) {
                $this->cacheTypeList->cleanType($type);
            }
        }

        // PERFORMANCE FIX: Removed aggressive full cache backend cleaning
        // Previously was: foreach ($this->cacheFrontendPool as $cacheFrontend) { $cacheFrontend->getBackend()->clean(); }
        // This was cleaning ALL cache backends regardless of the specified types
        // Now relying on Magento's intelligent cache invalidation through cleanType()
    }

    /**
     * Flush cache by specific tags
     * More efficient than flushing entire cache types
     *
     * @param array $tags Cache tags to invalidate
     * @return void
     */
    public function flushCacheByTags(array $tags)
    {
        if (!$this->getConfigModule('general/enabled')) {
            return;
        }

        if (empty($tags)) {
            return;
        }

        // Clean cache by specific tags - most efficient approach
        $this->cache->clean($tags);
    }

    /**
     * Get cache tags for a specific entity type
     *
     * @param string $entityType (product, category, cms_page, cms_block, config)
     * @param int|null $entityId
     * @return array
     */
    public function getCacheTagsForEntity($entityType, $entityId = null)
    {
        $tags = [];

        switch ($entityType) {
            case 'product':
                $tags[] = \Magento\Catalog\Model\Product::CACHE_TAG;
                if ($entityId) {
                    $tags[] = \Magento\Catalog\Model\Product::CACHE_TAG . '_' . $entityId;
                }
                break;

            case 'category':
                $tags[] = \Magento\Catalog\Model\Category::CACHE_TAG;
                if ($entityId) {
                    $tags[] = \Magento\Catalog\Model\Category::CACHE_TAG . '_' . $entityId;
                }
                break;

            case 'cms_page':
                $tags[] = \Magento\Cms\Model\Page::CACHE_TAG;
                if ($entityId) {
                    $tags[] = \Magento\Cms\Model\Page::CACHE_TAG . '_' . $entityId;
                }
                break;

            case 'cms_block':
                $tags[] = \Magento\Cms\Model\Block::CACHE_TAG;
                if ($entityId) {
                    $tags[] = \Magento\Cms\Model\Block::CACHE_TAG . '_' . $entityId;
                }
                break;

            case 'config':
                $tags[] = \Magento\Framework\App\Config::CACHE_TAG;
                break;
        }

        return $tags;
    }

}
