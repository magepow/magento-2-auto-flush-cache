<?php
namespace Magepow\AutoFlushCache\Plugin\Cms;

/**
 * Plugin to flush cache on CMS block save
 * Performance optimized with event-specific configuration check
 */
class FlushCache
{
    /**
     * @var \Magepow\AutoFlushCache\Helper\Data
     */
    protected $helperCache;

    /**
     * @param \Magepow\AutoFlushCache\Helper\Data $helperCache
     */
    public function __construct(
        \Magepow\AutoFlushCache\Helper\Data $helperCache
    ) {
        $this->helperCache = $helperCache;
    }

    /**
     * Flush cache after CMS block save if enabled
     *
     * @param \Magento\Cms\Controller\Adminhtml\Block\Save $subject
     * @param mixed $result
     * @return mixed
     */
    public function afterExecute(\Magento\Cms\Controller\Adminhtml\Block\Save $subject, $result)
    {
        // Check if CMS block save cache flush is enabled
        if (!$this->helperCache->getConfigModule('events/flush_on_cms_block_save')) {
            return $result;
        }

        // Check if tag-based invalidation is enabled (more efficient)
        if ($this->helperCache->getConfigModule('general/use_tag_invalidation')) {
            // Get block ID from request
            $blockId = $subject->getRequest()->getParam('block_id');
            $tags = $this->helperCache->getCacheTagsForEntity('cms_block', $blockId);
            $this->helperCache->flushCacheByTags($tags);
        } else {
            // Fallback to full cache type flush
            $this->helperCache->flushCache();
        }

        return $result;
    }
}  