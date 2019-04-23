<?php

namespace Redstage\GlobalTrackingPixel\Block\Adminhtml;

class GlobalTrackingPixel extends \Magento\Backend\Block\Widget\Container
{
    /**
     * @var string
     */
    protected $_template = 'globaltrackingpixel/globaltrackingpixel.phtml';

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param array $data
     */
    public function __construct(\Magento\Backend\Block\Widget\Context $context,array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * Prepare button and grid
     *
     * @return \Magento\Catalog\Block\Adminhtml\Product
     */
    protected function _prepareLayout()
    {
        $this->buttonList->add('add_new', array(
            'label'   => __('Add New'),
            'onclick' => "setLocation('" . $this->_getCreateUrl() . "')",
            'button_class' => '',
            'class' => 'primary',
        ));

        $this->setChild('grid', $this->getLayout()->createBlock('Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Grid', 'redstage.globaltrackingpixel.grid'));
        return parent::_prepareLayout();
    }

    /**
     *
     *
     * @return array
     */
    protected function _getAddButtonOptions()
    {

        $splitButtonOptions[] = [
            'label' => __('Add New'),
            'onclick' => "setLocation('" . $this->_getCreateUrl() . "')"
        ];

        return $splitButtonOptions;
    }

    /**
     *
     *
     * @param string $type
     * @return string
     */
    protected function _getCreateUrl()
    {
        return $this->getUrl(
            'globaltrackingpixel/*/new'
        );
    }

    /**
     * Render grid
     *
     * @return string
     */
    public function getGridHtml()
    {
        return $this->getChildHtml('grid');
    }

}