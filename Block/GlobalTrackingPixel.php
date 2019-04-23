<?php
namespace Redstage\GlobalTrackingPixel\Block;
use Magento\Customer\Api\CustomerRepositoryInterface;
class GlobalTrackingPixel extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    public $storeManager;
    
    /**
     * @var \Redstage\GlobalTrackingPixel\Helper\Data
     */
    public $helper;
    
    /**
     * @var \Magento\Framework\Registry
     */
    public $coreRegistry;
    
    /**
     * @var \Magento\Catalog\Helper\Data
     */
    public $catalogHelper;

    protected $_checkoutSession;

    protected $_customerSession;

    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;
    protected $_globalTrackingPixelFactory;


    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Apptrian\FacebookPixel\Helper\Data $helper
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Magento\Customer\Model\Session $customerSession
     * @param CustomerRepositoryInterface $customerRepository
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Redstage\GlobalTrackingPixel\Helper\Data $helper,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\Session $customerSession,
        CustomerRepositoryInterface $customerRepository,
        \Redstage\GlobalTrackingPixel\Model\GlobalTrackingPixelFactory $globalTrackingPixelFactory,
        array $data = []
    ) {
        $this->storeManager  = $context->getStoreManager();
        $this->helper        = $helper;
        $this->coreRegistry  = $coreRegistry;
        $this->_checkoutSession = $checkoutSession;
        $this->_customerSession = $customerSession;
        $this->customerRepository = $customerRepository;
        $this->_globalTrackingPixelFactory = $globalTrackingPixelFactory;
        parent::__construct($context, $data);
    }
    
    public function getCategoryProducts()
    {
        $category = $this->coreRegistry->registry('current_category');
        if ($category) {
            $productCollection = $category->getProductCollection()->addAttributeToSelect('entity_id');
            $productCollection->setPageSize(3)->setCurPage(1);
            return $productCollection;
        }
        return null;
    }

    /**
     * Returns product data needed for dynamic ads tracking.
     *
     * @return string
     */
    public function getProductSku()
    {
        $product = $this->coreRegistry->registry('current_product');
        return $product->getSku();
    }

    public function getQuoteData()
    {
        $quoteData = $this->_checkoutSession->getQuote()->getAllVisibleItems();

        return $quoteData;
    }

    public function getOrderData()
    {
        $order   = $this->_checkoutSession->getLastRealOrder();
        return $order;
    }

    /**
     * Return the Customer given the customer Id stored in the session.
     *
     * @return \Magento\Customer\Api\Data\CustomerInterface
     */
    public function getCustomer()
    {
        return $this->customerRepository->getById($this->_customerSession->getCustomerId());
    }

    public function getCustomerEmail()
    {
        if ($this->_customerSession->isLoggedIn()) {
            return $this->getCustomer()->getEmail();
        }

        return null;
    }

    public function getGlobalTrackingPixelCollection(){
        $globalTrackingPixelResult = $this->_globalTrackingPixelFactory->create();
        $collection = $globalTrackingPixelResult->getCollection();
        return $collection;
    }
}