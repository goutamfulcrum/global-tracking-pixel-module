<?php

namespace Redstage\GlobalTrackingPixel\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0){
    		$installer->run('create table global_tracking_pixel(entity_id int not null auto_increment, api_name varchar(100), 
                api_client_code varchar(100),
                display_in_global_page int(1),
                display_in_home_page int(1),
                display_in_category_page int(1),
                display_in_catalogsearch_page int(1),
                display_in_product_page int(1),
                display_in_cart_page int(1),
                display_in_checkout_page int(1),
                display_in_ordersuccess_page int(1),
                display_in_cms_page int(1),
                primary key(entity_id))');

    		//demo 
            //$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            //$scopeConfig = $objectManager->create('Magento\Framework\App\Config\ScopeConfigInterface');
            //demo 
        }

        $installer->endSetup();
    }
}