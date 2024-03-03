<?php

/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class PBXManager_AddToExistingRecord_View extends Vtiger_IndexAjax_View
{

    public function process(Vtiger_Request $request)
    {
        global  $adb;
        $viewer = $this->getViewer($request);
        $ModuleName = $request->getModule();
        $phone = $request->get('phone',false);
        $record = $request->get('recordid',false);
        $modules = array();
        $fieldid = getFieldid(getTabid('PBXManager'), 'customer');
        $result = $adb->pquery('SELECT relmodule FROM `vtiger_fieldmodulerel` WHERE fieldid = ?', array($fieldid));
        while ($data = $adb->fetch_array($result)) {
            $modules[] = $data["relmodule"];
        }
        foreach ($modules as $key => $module) {
            if (!Users_Privileges_Model::isPermitted($module, 'EditView')) {
                unset($modules[$key]);
            }
        }
        $moduleModel = Vtiger_Module_Model::getInstance($ModuleName);
        $viewer->assign('MODULE_MODEL', $moduleModel);
        $viewer->assign('referenceList', $modules);
        $viewer->assign('PHONE', $phone);
        $viewer->assign('PBXMANAGERID', $record);
        $viewer->assign('QUALIFIED_MODULE', $ModuleName);
        echo $viewer->view('ModalAjax.tpl',"Settings:PBXManager",true);
    }
}