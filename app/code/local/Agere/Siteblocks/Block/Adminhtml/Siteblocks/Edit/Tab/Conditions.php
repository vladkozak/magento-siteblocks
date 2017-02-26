<?php

class Agere_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Tab_Conditions extends Mage_Adminhtml_Block_Widget_Form implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    public function getTabTitle()
    {
        return $this->__('Conditions');
    }

    public function getTabLabel()
    {
        return $this->__('Conditions');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('conditions_form');
        $this->setTitle(Mage::helper('siteblocks')->__('Block Conditions'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('siteblocks_block');
        $form = new Varien_Data_Form();


        $form->setHtmlIdPrefix('block_');


        $model->getConditions()->setJsFormObject('block_conditions_fieldset');

        $renderer = Mage::getBlockSingleton('adminhtml/widget_form_renderer_fieldset')
            ->setTemplate('promo/fieldset.phtml')
            ->setNewChildUrl($this->getUrl('*/promo_catalog/newConditionHtml/form/block_conditions_fieldset'));

        $conditionsFieldset = $form->addFieldset('conditions_fieldset',
            array(
                'legend'=>Mage::helper('siteblocks')->__('Conditions'),
                'class' => 'fieldset-wide')
        )->setRenderer($renderer);
        $conditionsFieldset->addField('conditions', 'text', array(
            'name' => 'conditions',
            'label' => Mage::helper('siteblocks')->__('Conditions'),
            'title' => Mage::helper('siteblocks')->__('Conditions'),
            'required' => true,
        ))->setRule($model)->setRenderer(Mage::getBlockSingleton('rule/conditions'));

        $form->setValues($model->getData());
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
