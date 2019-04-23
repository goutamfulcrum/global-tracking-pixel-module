<?php
namespace Redstage\GlobalTrackingPixel\Block\Adminhtml\GlobalTrackingPixel\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('globaltrackingpixel_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Global Tracking Pixel Information'));
    }
}