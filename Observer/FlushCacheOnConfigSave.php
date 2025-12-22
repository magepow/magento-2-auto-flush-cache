<?php
namespace Magepow\AutoFlushCache\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

/**
 * Flush cache on system configuration save
 */
class FlushCacheOnConfigSave implements ObserverInterface
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
     * Execute cache flush if enabled
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->helperCache->getConfigModule('events/flush_on_config_save')) {
            return;
        }

        // For config changes, use tag-based invalidation if enabled
        if ($this->helperCache->getConfigModule('general/use_tag_invalidation')) {
            $tags = $this->helperCache->getCacheTagsForEntity('config');
            $this->helperCache->flushCacheByTags($tags);
        } else {
            $this->helperCache->flushCache();
        }
    }
}
