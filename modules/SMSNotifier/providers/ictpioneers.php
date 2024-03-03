<?php
/*********************************************************************************
 ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ********************************************************************************/


 ini_set("soap.wsdl_cache_enabled", "0");

class SMSNotifier_ictpioneers_Provider implements SMSNotifier_ISMSProvider_Model {

	private $_username;
	private $_password;
	private $_parameters = array();

	const SERVICE_URI = 'http://ippanel.com/class/sms/wsdlservice/server.php?wsdl';
	

	private static $REQUIRED_PARAMETERS = array();

	function __construct() {
		
	}

	public function getName() {
		return 'ictpioneers';
	}

	public function setAuthParameters($username, $password) {
		$this->_username = $username;
		$this->_password = $password;
	}

	public function setParameter($key, $value) {
		$this->_parameters[$key] = $value;
	}

	public function getParameter($key, $defvalue = false) {
		if (isset($this->_parameters[$key])) {
			return $this->_parameters[$key];
		}
		return $defvalue;
	}

	public function getRequiredParams() {
		return self::$REQUIRED_PARAMETERS;
	}

	public function getServiceURL($type = false) {
		if ($type) {
			switch (strtoupper($type)) {
				case self::SERVICE_AUTH: return self::SERVICE_URI . '/api/smsapi.aspx';
				case self::SERVICE_SEND: return self::SERVICE_URI . '/api/smsapi.aspx';
				case self::SERVICE_QUERY: return self::SERVICE_URI . '/api/smsstatus.aspx';
			}
		}
		return false;
	}

	protected function prepareParameters()
	{
		$params = array('username' => $this->_username, 'password' => $this->_password);
		foreach (self::$REQUIRED_PARAMETERS as $key) {
			$params[$key] = $this->getParameter($key);
		}
		return $params;
	}

	public function send($message, $tonumbers) 
	{
		try {
			$params = $this->prepareParameters();
			
			if (!is_array($tonumbers)) 
			{
				$tonumbers = array($tonumbers);
			}

			foreach ($tonumbers as $i => $tonumber) 
			{
				$tonumbers[$i] = str_replace(array('(', ')', ' ', '+', '-'), '', $tonumber);
			}
			$encoding = "UTF-8";//CP1256, CP1252
			$textMessage = iconv($encoding,'UTF-8//TRANSLIT',$message);

			$client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
			$user = $params['username'];
			$pass = $params['password'];
			$fromNum = '3000505';
			$toNum = $tonumbers;
			$messageContent = $message;
			$op  = "send";
			//If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'
			
			$time = '';
			
			$client->SendSMS($fromNum,$toNum,$messageContent,$user,$pass,$time,$op);


			$results = array();
			$status = array( 'error' => true, 'statusmessage' => '' );
			$status['error'] = false;
			$status['to'] = '091919191';
			$status['statusmessage'] = 'ok';
			$status['id'] = '1';
			$results = $status;
			return $result;

		} catch (SoapFault $ex) {
			$results = array();
			$status = array( 'error' => true, 'statusmessage' => '' );
			$status['error'] = true;
			$status['to'] = '091919191';
			$status['statusmessage'] = 'No';
			$status['id'] = '1';
			$results = $status;
			return $result;
		}
	}

	public function query($messageid) {
		$result = array();
		$result['status'] = self::MSG_STATUS_FAILED;
		$result['needlookup'] = 0;
		$result['statusmessage'] = 'Message delivery failed.';

		return $result;
	}

}

?>
