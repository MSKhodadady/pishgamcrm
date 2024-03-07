<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.2
 * ("License.txt"); You may not use this file except in compliance with the License
 * The Original Code is: Vtiger CRM Open Source
 * The Initial Developer of the Original Code is Vtiger.
 * Portions created by Vtiger are Copyright (C) Vtiger.
 * All Rights Reserved.
 * ***********************************************************************************/

version_compare(PHP_VERSION, '5.5.0') <= 0 ? error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED) : error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT); // PRODUCTION
//ini_set('display_errors','on'); version_compare(PHP_VERSION, '5.5.0') <= 0 ? error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED) : error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);   // DEBUGGING

if (file_exists('PortalConfig.php')) {
	include_once 'PortalConfig.php';
	global $crmUrlFromPC;
	if ($Server_Path) {
		$crmUrlFromPC = $Server_Path;
	}

	global $portalUrlFromPC;
	if ($Authenticate_Path) {
		$portalUrlFromPC = $Authenticate_Path;
	}
}

class Portal_Config_Data
{

	protected static function getData()
	{
		global $crmUrlFromPC;

		$data = array(
			//CRM URL without trialing/
			//Example: http://yourdomain.com/crm
			'crm.url' => getenv('site_URL'),

			//Portal URL without trialing/
			//Example: http://yourdomain.com/portal
			'portal.url' => getenv('site_URL') . '/portal',

			'crm.version' => '7.1.0', // Framework version for API
			'language' => 'fa_ir', // Default Language for API. Note : Changing the language here will not change the default/login language for Portal user.
			'layout' => 'default',
		);
		

		$crmUrl = $data['crm.url'];
		if (!$crmUrl && $crmUrlFromPC) {
			$crmUrl = $crmUrlFromPC;
			$data['crm.url'] = $crmUrlFromPC;
		}
		if ($crmUrl) {
			$data['crm.connect.url'] = $crmUrl . '/modules/CustomerPortal/api.php';
		}

		global $portalUrlFromPC;
		$portalUrl = $data['portal.url'];
		if (!$portalUrl && $portalUrlFromPC) {
			$data['portal.url'] = $portalUrlFromPC;
		}

		$data['upload_max_filesize'] = '100 MB';
		//defaultUiLanguage is the ui language, should be one of the values from availableLanguages.
		$data['ui.Language'] = array('label' => 'Farsi', 'value' => 'fa_ir');

		//availableLanguages is the array containing all the label and value pair of all supported languages.
		$data['languages'] = array(
			array('label' => 'Farsi', 'value' => 'fa_ir')
		);
		
		
		return $data;
	}
}

//Give a temporary directory path which is used when we upload attachment
$upload_dir = '/tmp';

//The character set to be used as character encoding for all soap requests
$default_charset = 'UTF-8'; //'ISO-8859-1';

$default_language = 'fa_ir';
