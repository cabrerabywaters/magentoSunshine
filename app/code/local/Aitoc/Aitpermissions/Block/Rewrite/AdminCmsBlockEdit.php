<?php
/**
 * Advanced Permissions
 *
 * @category:    Aitoc
 * @package:     Aitoc_Aitpermissions
 * @version      2.10.9
 * @license:     9DAcmpHmKm5MrRdfs5lugvpF2c0A7dPjtx5lj0JMEV
 * @copyright:   Copyright (c) 2015 AITOC, Inc. (http://www.aitoc.com)
 */
class Aitoc_Aitpermissions_Block_Rewrite_AdminCmsBlockEdit extends Mage_Adminhtml_Block_Cms_Block_Edit
{
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $role = Mage::getSingleton('aitpermissions/role');

        if ($role->isPermissionsEnabled())
        {
            // if page is not assigned to any store views but permitted, will allow to delete and disable it
            $blockModel = Mage::registry('cms_block');
            if ($blockModel->getStoreId() && is_array($blockModel->getStoreId()))
            {
                foreach ($blockModel->getStoreId() as $blockStoreId)
                {
                    if (!in_array($blockStoreId, $role->getAllowedStoreviewIds()))
                    {
                        $this->_removeButton('delete');
                        break 1;
                    }
                }
            }
        }
        
        return $this;
    }
}