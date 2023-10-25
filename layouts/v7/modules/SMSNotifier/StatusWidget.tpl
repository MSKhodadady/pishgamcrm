{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<div>
		<table width="100%" cellpadding="3" cellspacing="1" border="0" class="lvt small">

			{foreach item=ST from=$STATUSRECORDS}
			<tr>
				<td  style="font-family:tahoma;font-size:12px;" nowrap="nowrap" bgcolor="{$ST.statuscolor}" width="25%">{$ST.tonumber}     >  {$ST.statusmessage}</td>
			</tr>
			{/foreach}

		</table>
	</div>
