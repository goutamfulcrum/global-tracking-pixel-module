<?php
namespace Redstage\GlobalTrackingPixel\Helper;
use \Magento\Framework\App\Helper\Context;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\App\Filesystem\DirectoryList;
use \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use \Magento\CatalogInventory\Api\StockRegistryInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public $directory_list = null;
    protected $storeManager = null;
    protected $_productCollectionFactory = null;
    protected $_stockRegistry = null;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Catalog\Model\ProductTypes\ConfigInterface $config
     */
    public function __construct(
        Context $context,
        DirectoryList $directory_list,
        StoreManagerInterface $storeManager,
        CollectionFactory $productCollectionFactory,
        StockRegistryInterface $stockRegistry
    ) {
        parent::__construct($context);
        $this->directory_list = $directory_list;
        $this->storeManager = $storeManager;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_stockRegistry = $stockRegistry;
    }

    public function getStoreManager()
    {
        return $this->storeManager;
    }  
}