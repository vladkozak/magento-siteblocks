<?php

class Agere_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('block_form');
        $this->setTitle(Mage::helper('siteblocks')->__('Block Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('siteblocks_block');
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save',array('block_id'=>$this->getRequest()->getParam('block_id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            )
        );


        $form->setHtmlIdPrefix('block_');


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }
}
