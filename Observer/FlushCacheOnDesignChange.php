<?php
namespace Magepow\AutoFlushCache\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

/**
 * Flush cache on design configuration change
 */
class FlushCacheOnDesignChange implements ObserverInterface
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
        if (!$this->helperCache->getConfigModule('events/flush_on_design_change')) {
            return;
        }

        // Design changes typically affect layout and block_html caches
        // Use standard cache flush for design changes
        $this->helperCache->flushCache(['layout', 'block_html', 'full_page']);
    }
}
