<?php
class Agere_Siteblocks_Block_List extends Mage_Core_Block_Template {

    public function getBlocks()
    {
        //return Mage::getResourceModel('siteblocks/block_collection');
        $items = Mage::getModel('siteblocks/block')->getCollection()
            ->addFieldToFilter('block_status',array('eq'=>Agere_Siteblocks_Model_Source_Status::ENABLED));
        $filteredItems = $items;
        if(Mage::registry('current_product') instanceof Mage_Catalog_Model_Product) {
            $filteredItems = array();
            /** @var IGN_Siteblocks_Model_Block $item */
            foreach ($items as $item) {
                if($item->validate(Mage::registry('current_product'))) {
                    $filteredItems[] = $item;
                }
            }
        }
        return $filteredItems;
    }

    public function getBlockContent($block)
    {
        $processor = Mage::helper('cms')->getBlockTemplateProcessor();
        $html = $processor->filter($block->getContent());
        return $html;
    }

}