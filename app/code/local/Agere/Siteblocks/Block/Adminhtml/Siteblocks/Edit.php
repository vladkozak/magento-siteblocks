<?php

class Agere_Siteblocks_Block_Adminhtml_Siteblocks_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'block_id';
        $this->_controller = 'adminhtml_siteblocks';
        $this->_blockGroup = 'siteblocks';

        parent::__construct();

        $this->_updateButton(
            'save', 'label', Mage::helper('siteblocks')->__('Save Block')
        );
        $this->_updateButton(
            'delete', 'label', Mage::helper('siteblocks')->__('Delete Block')
        );

        $this->_addButton(
            'saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__(
                'Save and Continue Edit'
            ),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100
        );

        $this->_formScripts[]
            = "


            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('siteblocks_block')->getId()) {
            return Mage::helper('siteblocks')->__(
                "Edit Block '%s'", $this->escapeHtml(
                Mage::registry('siteblocks_block')->getTitle()
            )
            );
        } else {
            return Mage::helper('siteblocks')->__('New Block');
        }
    }

}
