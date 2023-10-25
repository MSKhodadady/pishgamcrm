{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
********************************************************************************/
-->*}

<div width="100%" class="table table-borderless">
	<div class="row">
		<div class = "greenColor col-md-8">{'LBL_TOTAL_RECORDS_IMPORTED'|@vtranslate:$MODULE}</div>
		<div class="col-md-1">:</div>
		<div class = "greenColor col-md-3">{$IMPORT_RESULT.IMPORTED} / {$IMPORT_RESULT.TOTAL}</div>
	</div>
	<div class="row">
		<div class = "greenColor col-md-3">{'LBL_NUMBER_OF_RECORDS_CREATED'|@vtranslate:$MODULE}</div>
		<div class="col-md-1">:</div>
		<div  class = "greenColor col-md-8">{$IMPORT_RESULT.CREATED}
			{if $IMPORT_RESULT['CREATED'] neq '0'}
				{if $FOR_MODULE neq 'Users'}
					&nbsp;&nbsp;&nbsp;&nbsp;<a class="cursorPointer" onclick="return Vtiger_Import_Js.showLastImportedRecords('index.php?module={$MODULE}&for_module={$FOR_MODULE}&view=List&start=1&foruser={$OWNER_ID}&_showContents=0')">{'LBL_DETAILS'|@vtranslate:$MODULE}</a>
				{/if}
			{/if}
		</div>

	</div>
	{if in_array($FOR_MODULE, $INVENTORY_MODULES) eq FALSE}
		<div class="row">
			<div class="col-md-8">{'LBL_NUMBER_OF_RECORDS_UPDATED'|@vtranslate:$MODULE}</div>
			<div class="col-md-1">:</div>
			<div class="col-md-3">{$IMPORT_RESULT.UPDATED}</div>
		</div>
		<div class="row">
			<div class="col-md-8">{'LBL_NUMBER_OF_RECORDS_SKIPPED'|@vtranslate:$MODULE}</div>
			<div class="col-md-1">:</div>
			<div class="col-md-3">{$IMPORT_RESULT.SKIPPED}
				{if $IMPORT_RESULT['SKIPPED'] neq '0'}
					&nbsp;&nbsp;&nbsp;&nbsp;<a class="cursorPointer" onclick="return Vtiger_Import_Js.showSkippedRecords('index.php?module={$MODULE}&view=List&mode=getImportDetails&type=skipped&start=1&foruser={$OWNER_ID}&_showContents=0&for_module={$FOR_MODULE}')">{'LBL_DETAILS'|@vtranslate:$MODULE}</a>
				{/if}
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">{'LBL_NUMBER_OF_RECORDS_MERGED'|@vtranslate:$MODULE}</div>
			<div class="col-md-1">:</div>
			<div class="col-md-1">{$IMPORT_RESULT.MERGED}</div>
		</div>
	{/if}
	{if $IMPORT_RESULT['FAILED'] neq '0'}
		<div class="row">
			<div class="col-md-8"><font color = "red">{'LBL_TOTAL_RECORDS_FAILED'|@vtranslate:$MODULE}</font></div>
			<div class="col-md-1">:</div>
			<div class="col-md-3"><font color = "red">{$IMPORT_RESULT.FAILED} / {$IMPORT_RESULT.TOTAL}</font>
				&nbsp;&nbsp;&nbsp;&nbsp;<a class="cursorPointer" onclick="return Vtiger_Import_Js.showFailedImportRecords('index.php?module={$MODULE}&view=List&mode=getImportDetails&type=failed&start=1&foruser={$OWNER_ID}&_showContents=0&for_module={$FOR_MODULE}')">{'LBL_DETAILS'|@vtranslate:$MODULE}</a>
			</div>
		</div>
	{/if}
</div>
