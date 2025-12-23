<?php
namespace Magepow\AutoFlushCache\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

/**
 * Observer to flush cache on specific events
 * Performance optimized to check event-specific configuration
 */
class FlushCache implements ObserverInterface
{
    /**
     * @var \Magepow\AutoFlushCache\Helper\Data
     */
    protected $helperCache;

    /**
     * @var string|null
     */
    protected $eventConfigPath;

    /**
     * @param \Magepow\AutoFlushCache\Helper\Data $helperCache
     * @param string|null $eventConfigPath Configuration path for this specific event
     */
    public function __construct(
        \Magepow\AutoFlushCache\Helper\Data $helperCache,
        $eventConfigPath = null
    ) {
        $this->helperCache = $helperCache;
        $this->eventConfigPath = $eventConfigPath;
    }

    /**
     * Execute cache flush if enabled for this specific event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        // Check if this specific event is enabled
        if ($this->eventConfigPath && !$this->helperCache->getConfigModule($this->eventConfigPath)) {
            return;
        }

        $this->helperCache->flushCache();
    }
}  