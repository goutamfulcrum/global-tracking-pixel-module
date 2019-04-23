<?php
namespace Redstage\GlobalTrackingPixel\Model\ResourceModel;

class GlobalTrackingPixel extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('global_tracking_pixel', 'entity_id');
    }
}
?>