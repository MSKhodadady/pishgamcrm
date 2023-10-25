<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
vimport('~~/modules/SMSNotifier/SMSNotifier.php');

class SMSNotifier_Record_Model extends Vtiger_Record_Model {

	public static function SendSMS($message, $toNumbers, $currentUserId, $recordIds, $moduleName) {
		SMSNotifier::sendsms($message, $toNumbers, $currentUserId, $recordIds, $moduleName);
	}

	public function checkStatus() {
		$statusDetails = SMSNotifier::smsquery($this->get('id'));
		$statusDetails = SMSNotifier::getSMSStatusInfo($this->get('id'));
		$i=0;
		foreach ($statusDetails as $row) {
			$statusDetails[$i]['statuscolor'] = $this->getColorForStatus($row['status']);
			$i++;
		}
		return $statusDetails;
	}

	public function getCheckStatusUrl() {
		return "index.php?module=".$this->getModuleName()."&view=CheckStatus&record=".$this->getId();
	}

	public function getColorForStatus($smsStatus) {
		if ($smsStatus == 'pending') {
			$statusColor = '#FFFCDF';
		} elseif ($smsStatus == 'Dispatched' || $smsStatus == 'send' || $smsStatus == 'notsync' || $smsStatus == 'delivered') {
			$statusColor = '#E8FFCF';
		} elseif ($smsStatus == 'failed' || $smsStatus == 'Failed' || $smsStatus == 'discarded') {
			$statusColor = '#FFE2AF';
		} else {
			$statusColor = '#eeeeee';
		}
		return $statusColor;
	}
}
