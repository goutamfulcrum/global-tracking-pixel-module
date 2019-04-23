<?php

namespace Redstage\GlobalTrackingPixel\Model\ResourceModel\GlobalTrackingPixel;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Redstage\GlobalTrackingPixel\Model\GlobalTrackingPixel', 'Redstage\GlobalTrackingPixel\Model\ResourceModel\GlobalTrackingPixel');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }
}
?>