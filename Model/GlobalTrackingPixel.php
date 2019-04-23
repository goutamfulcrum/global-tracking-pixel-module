<?php
namespace Redstage\GlobalTrackingPixel\Model;

class GlobalTrackingPixel extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Redstage\GlobalTrackingPixel\Model\ResourceModel\GlobalTrackingPixel');
    }
}
?>