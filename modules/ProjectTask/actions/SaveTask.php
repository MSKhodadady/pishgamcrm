<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
require_once 'include/utils/jdf.php';

class ProjectTask_SaveTask_Action extends Vtiger_Save_Action {

	public function process(Vtiger_Request $request) {
		$response = new Vtiger_Response();
		try {
			$recordModel = $this->saveRecord($request);
			$response->setResult(array('record' => $recordModel->getId(), 'module' => $recordModel->getModuleName()));
		} catch (DuplicateException $e) {
			$response->setError($e->getMessage(), $e->getDuplicationMessage(), $e->getMessage());
		} catch (Exception $e) {
			$response->setError($e->getMessage());
		}
		$response->emit();
	}

	/**
	 * Function to save record
	 * @param <Vtiger_Request> $request - values of the record
	 * @return <RecordModel> - record Model of saved record
	 */
	public function saveRecord($request) {
		$recordModel = $this->getRecordModelFromRequest($request);
				//ictpioneers
				$fieldModelList = $recordModel->getModule()->getFields();
				foreach ($fieldModelList as $fieldName => $fieldModel) {
			  $recordFieldValue = $recordModel->get($fieldName);
					$fieldValue = $displayValue = Vtiger_Util_Helper::toSafeHTML($recordFieldValue);
					if ($fieldModel->getFieldDataType() == 'datetime' || $fieldModel->getFieldDataType() == 'date') {
						$recordModel->set($fieldName,jalToGre($fieldValue));
					}
				}
				//ictpioneers
		$recordModel->save();
		return $recordModel;
	}
}
