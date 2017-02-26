<?php
class Agere_Siteblocks_Model_Cron {


    public function siteblocks_clear_cache()
    {
      //do something here
        Mage::app()->cleanCache(array('siteblocks_blocks'));
    }

}
