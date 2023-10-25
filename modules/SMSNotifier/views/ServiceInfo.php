<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class SMSNotifier_ServiceInfo_View extends Vtiger_IndexAjax_View {

	function getServiceInfo() {
		$p = SMSNotifierManager::getActiveSmsProvider();
		if(!$p){
			$serviceInfo="<a style='display:inline-block;text-align:justify;color:#009688;line-height:25px;' href='http://sms.partosms.ir' target='_blank'>هیچ سرویس دهنده فعالی وجود ندارد.برای فعال سازی این بخش لطفا اینجا کلیک کنید.</a>";
		}
		else{
			$par=Zend_Json::decode(decode_html($p['parameters']));
			$credit="";
			$buyLink='';
			if($p['providertype']=="Smsictpioneers"){
				$p['providertype']='<a href="http://sms.partosms.ir" target="_blank">sms.partosms.ir</a>';
				$provider=new SMSNotifier_Smsictpioneers_Provider();
				$credit=(int) $provider->getCredit($p['username'],$p['password']);
				$v=array('user'=>$p['username'],'pass'=>$p['password']);
				$token="token=".base64_encode(Zend_Json::encode($v));
				$buyLink="<li><a class='buyCredit' href='".$site_URL."smsictpioneers.php?".$token."' target='_blank'>** خرید اعتبار پیامکی **</a></li>";
				$credit="<li><span>اعتبار:</span>". number_format($credit)." ریال</li>";
			}
			$serviceInfo='<ul class="serviceInfo">
											'.$credit.$buyLink.'
											<li><span>سرویس دهنده:</span>'.$p['providertype'].'</li>
											<li><span>نام کاربری:</span>'.$p['username'].'</li>';
			foreach ($par as $key => $value) {
				if($key=="line")
					$serviceInfo.='<li><span>خط ارسال:</span>'.$value.'</li>';
			}
			$serviceInfo.='</ul>';
		}

		return $serviceInfo;
	}
}
