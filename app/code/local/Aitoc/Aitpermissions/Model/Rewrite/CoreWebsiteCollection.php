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
class Aitoc_Aitpermissions_Model_Rewrite_CoreWebsiteCollection extends Mage_Core_Model_Mysql4_Website_Collection
{
    public function toOptionHash()
    {
        $role = Mage::getSingleton('aitpermissions/role');
        if ($role->isPermissionsEnabled())
        {
            $this->addFieldToFilter('website_id', array('in' => $role->getAllowedWebsiteIds()));
        }

        return parent::toOptionHash();
    }
}