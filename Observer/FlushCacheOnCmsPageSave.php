<?php
namespace Magepow\AutoFlushCache\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

/**
 * Flush cache on CMS page save
 */
class FlushCacheOnCmsPageSave implements ObserverInterface
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
        if (!$this->helperCache->getConfigModule('events/flush_on_cms_page_save')) {
            return;
        }

        // Check if tag-based invalidation is enabled (more efficient)
        if ($this->helperCache->getConfigModule('general/use_tag_invalidation')) {
            $page = $observer->getEvent()->getObject();
            $pageId = $page ? $page->getId() : null;
            $tags = $this->helperCache->getCacheTagsForEntity('cms_page', $pageId);
            $this->helperCache->flushCacheByTags($tags);
        } else {
            // Fallback to full cache type flush
            $this->helperCache->flushCache();
        }
    }
}
