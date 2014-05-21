<?php
 
require_once 'CRM/Admin/Form/Setting.php';
require_once 'CRM/Core/BAO/CustomField.php';
 
class CRM_Admin_Form_Setting_SepaSettings extends CRM_Admin_Form_Setting
{
    public function buildQuickForm( ) {
        CRM_Utils_System::setTitle(ts('Sepa Direct Debit - Settings'));
 
 
        $customFields = CRM_Core_BAO_CustomField::getFields();
        $cf = array();
        foreach ($customFields as $k => $v) {
            $cf[$k] = $v['label'];
        }

        $thirty_days_arr = array();
        $thirty_days_arr[''] = ts('- select -');
        for ($i=0; $i <= 30; $i++) { 
        	$thirty_days_arr[$i] = $i;
        }
 
        $this->addElement('select',
                          'sepasettings_ooff_horizon_days',
                          ts('OOFF horizon days'),
                          $thirty_days_arr + $cf);
 
        $this->addElement('text',
                          'sepasettings_recipient',
                          ts('Email address to receive module notices')
                          );
 
        parent::buildQuickForm();
    }
}