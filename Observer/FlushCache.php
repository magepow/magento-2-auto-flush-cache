<?php
namespace Magepow\AutoFlushCache\Observer;

class FlushCache implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * @var \Magepow\AutoFlushCache\Helper\Data
     */
    protected $helperCache;

    public function __construct(
        \Magepow\AutoFlushCache\Helper\Data $helperCache
    ) {
        $this->helperCache = $helperCache;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->helperCache->flushCache();
    }
}  