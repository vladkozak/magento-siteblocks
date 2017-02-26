<?php
class Agere_Siteblocks_Test1Controller extends Mage_Core_Controller_Front_Action {

    public function renamedAction()
    {
        $enabled = Mage::getStoreConfig('siteblocks/settings/enabled');
        $count = Mage::getStoreConfig('siteblocks/settings/blocks_count');
        $text = Mage::getStoreConfig('siteblocks/settings/raw_text');
        Mage::app()->getConfig()->saveConfig('siteblocks/settings/enabled','0');

        var_dump($enabled);
        die('test');
    }
}