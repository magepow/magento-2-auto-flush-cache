<?php
namespace Magepow\AutoFlushCache\Plugin\Cms;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Model\Block;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;

class FlushCache extends \Magento\Cms\Controller\Adminhtml\Block\Save
{

    /**
     * @var \Magepow\AutoFlushCache\Helper\Data
     */
    protected $helperCache;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     * @param BlockFactory|null $blockFactory
     * @param BlockRepositoryInterface|null $blockRepository
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        BlockFactory $blockFactory,
        BlockRepositoryInterface $blockRepository,
        \Magepow\AutoFlushCache\Helper\Data $helperCache
    ) {

        $this->helperCache = $helperCache;
        parent::__construct($context, $coreRegistry, $dataPersistor, $blockFactory, $blockRepository);
    }

    public function afterExecute(\Magento\Cms\Controller\Adminhtml\Block\Save $subject, $result)
    {
        $this->helperCache->flushCache();
        return $result;
    }

}  