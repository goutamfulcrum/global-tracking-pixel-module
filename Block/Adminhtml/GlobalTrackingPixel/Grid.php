<?php
namespace Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Redstage\GlobalTrackingPixel\Model\GlobalTrackingPixelFactory
     */
    protected $_globalTrackingPixelFactory;

    /**
     * @var \Redstage\GlobalTrackingPixel\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Redstage\GlobalTrackingPixel\Model\GlobalTrackingPixelFactory $globalTrackingPixelFactory
     * @param \Redstage\GlobalTrackingPixel\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Redstage\GlobalTrackingPixel\Model\GlobalTrackingPixelFactory $globalTrackingPixelFactory,
        \Redstage\GlobalTrackingPixel\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_globalTrackingPixelFactory = $globalTrackingPixelFactory;
        $this->_status = $status;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('postGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('post_filter');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_globalTrackingPixelFactory->create()->getCollection();
        $this->setCollection($collection);

        parent::_prepareCollection();

        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'entity_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'entity_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );

		$this->addColumn(
			'api_name',
			[
				'header' => __('Api Name'),
				'index' => 'api_name',
			]
		);
		
		$this->addColumn(
			'api_client_code',
			[
				'header' => __('Api Client Code'),
				'index' => 'api_client_code',
			]
		);

		$this->addColumn(
			'display_in_global_page',
			[
				'header' => __('Display In Global Page '),
				'index' => 'display_in_global_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray2()
			]
		);
					
		$this->addColumn(
			'display_in_home_page',
			[
				'header' => __('Display In Home Page '),
				'index' => 'display_in_home_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray3()
			]
		);
				
		$this->addColumn(
			'display_in_category_page',
			[
				'header' => __('Display In Category Page '),
				'index' => 'display_in_category_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray4()
			]
		);
		
		$this->addColumn(
			'display_in_catalogsearch_page',
			[
				'header' => __('Display In Catalog Search Page '),
				'index' => 'display_in_catalogsearch_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray5()
			]
		);		
		
		$this->addColumn(
			'display_in_product_page',
			[
				'header' => __('Display In Product  Page '),
				'index' => 'display_in_product_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray6()
			]
		);		
		
		$this->addColumn(
			'display_in_cart_page',
			[
				'header' => __('Display In Cart Page '),
				'index' => 'display_in_cart_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray7()
			]
		);
		
		$this->addColumn(
			'display_in_checkout_page',
			[
				'header' => __('Display In Checkout Page '),
				'index' => 'display_in_checkout_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray8()
			]
		);

		$this->addColumn(
			'display_in_ordersuccess_page',
			[
				'header' => __('Display In Order Success Page '),
				'index' => 'display_in_ordersuccess_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray9()
			]
		);
		
		$this->addColumn(
			'display_in_cms_page',
			[
				'header' => __('Display In Cms Page '),
				'index' => 'display_in_cms_page',
				'type' => 'options',
				'options' => \Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray10()
			]
		);
		
        $this->addColumn(
            'edit',
            [
                'header' => __('Action'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit'
                        ],
                        'field' => 'entity_id'
                    ]
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );
		

        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }

	
    /**
     * @return $this
     */
    protected function _prepareMassaction()
    {

        $this->setMassactionIdField('entity_id');
        //$this->getMassactionBlock()->setTemplate('Redstage_GlobalTrackingPixel::globaltrackingpixel/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('globaltrackingpixel');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('globaltrackingpixel/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('globaltrackingpixel/*/massStatus', ['_current' => true]),
                'additional' => [
                    'visibility' => [
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => __('Status'),
                        'values' => $statuses
                    ]
                ]
            ]
        );

        return $this;
    }
		

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('globaltrackingpixel/*/index', ['_current' => true]);
    }

    /**
     * @param \Redstage\GlobalTrackingPixel\Model\GlobalTrackingPixel|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {		
        return $this->getUrl(
            'globaltrackingpixel/*/edit',
            ['entity_id' => $row->getId()]
        );		
    }

	
	static public function getOptionArray2()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray2()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray2() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);
	}
		
	static public function getOptionArray3()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray3()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray3() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);
	}
		
	static public function getOptionArray4()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray4()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray4() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);
	}
		
	static public function getOptionArray5()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray5()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray5() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);
	}
		
	static public function getOptionArray6()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray6()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray6() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);
	}
		
	static public function getOptionArray7()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray7()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray7() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);

	}
		
	static public function getOptionArray8()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray8()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray8() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);
	}
		
	static public function getOptionArray9()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray9()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray9() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);
	}
	
	static public function getOptionArray10()
	{
        $data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
        return($data_array);
	}

	static public function getValueArray10()
	{
        $data_array=array();
		foreach(\Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid::getOptionArray10() as $k=>$v){
           $data_array[]=array('value'=>$k,'label'=>$v);		
		}
        return($data_array);
	}

}