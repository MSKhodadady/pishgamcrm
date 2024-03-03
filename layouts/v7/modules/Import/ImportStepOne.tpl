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

<div class ="importBlockContainer show" id = "uploadFileContainer">
    <div class = "table table-borderless" style="line-height:1.8" >
        <span>
			{if $FORMAT eq 'vcf'}
				<h4>&nbsp;&nbsp;&nbsp;{'LBL_IMPORT_FROM_VCF_FILE'|@vtranslate:$MODULE}</h4>
			{else if $FORMAT eq 'ics'}
				<h4>&nbsp;&nbsp;&nbsp;{'LBL_IMPORT_FROM_ICS_FILE'|@vtranslate:$MODULE}</h4>
			{else}
				<h4>&nbsp;&nbsp;&nbsp;{'LBL_IMPORT_FROM_CSV_FILE'|@vtranslate:$MODULE}</h4>
			{/if}
        </span>
        <hr>
        <div class="row" id="file_type_container" style="height:50px">
			{if $FORMAT eq 'vcf'}
				<div class=" col-md-4 col-sm-12 col-xs-12">{'LBL_SELECT_VCF_FILE'|@vtranslate:$MODULE}</div>
			{else if $FORMAT eq 'ics'}
				<div class=" col-md-4 col-sm-12 col-xs-12">{'LBL_SELECT_ICS_FILE'|@vtranslate:$MODULE}</div>
			{else}
				<div class=" col-md-4 col-sm-12 col-xs-12">{'LBL_SELECT_CSV_FILE'|@vtranslate:$MODULE}</div>
			{/if}
            <div class=" col-md-8 col-sm-12 col-xs-12" data-import-upload-size="{$IMPORT_UPLOAD_SIZE}" data-import-upload-size-mb="{$IMPORT_UPLOAD_SIZE_MB}">
                <div>
                    <input type="hidden" id="type" name="type" value="csv" />
                    <input type="hidden" name="is_scheduled" value="1" />
                    <div class="fileUploadBtn btn btn-primary">
                        <span><i class="fa fa-laptop"></i> {vtranslate('Select from My Computer', $MODULE)}</span>
                        <input type="file" name="import_file" id="import_file" onchange="Vtiger_Import_Js.checkFileType(event)" data-file-formats="{if $FORMAT eq ''}csv{else}{$FORMAT}{/if}" />
                    </div>
                    <div id="importFileDetails" class="padding10"></div>
                </div>
            </div>
        </div>
        {if $FORMAT eq 'csv'}
            <div class="row" id="has_header_container" style="height:50px">
                <div class=" col-md-4 col-sm-12 col-xs-12">{'LBL_HAS_HEADER'|@vtranslate:$MODULE}</div>
                <div class=" col-md-8 col-sm-12 col-xs-12">
                    <input type="checkbox" id="has_header" name="has_header" checked />
                </div>
            </div>
        {/if}
		{if $FORMAT neq 'ics'}
			<div class="row" id="file_encoding_container" style="height:50px">
				<div class=" col-md-4 col-sm-12 col-xs-12">{'LBL_CHARACTER_ENCODING'|@vtranslate:$MODULE}</div>
				<div class=" col-md-8 col-sm-12 col-xs-12">
					<select name="file_encoding" id="file_encoding" class="select2">
						{foreach key=_FILE_ENCODING item=_FILE_ENCODING_LABEL from=$SUPPORTED_FILE_ENCODING}
							<option value="{$_FILE_ENCODING}">{$_FILE_ENCODING_LABEL|@vtranslate:$MODULE}</option>
						{/foreach}
					</select>
				</div>
			</div>
		{/if}
        {if $FORMAT eq 'csv'}
            <div class="row" id="delimiter_container" style="height:50px">
                <div class=" col-md-4 col-sm-12 col-xs-12">{'LBL_DELIMITER'|@vtranslate:$MODULE}</div>
                <div class=" col-md-8 col-sm-12 col-xs-12">
                    {foreach key=_DELIMITER item=_DELIMITER_LABEL from=$SUPPORTED_DELIMITERS name=delimiters}
                        &nbsp;&nbsp;<label class="radio-group"><input type="radio" name="delimiter" value="{$_DELIMITER}" {if $smarty.foreach.delimiters.index eq 0} checked="true" {/if} style="margin-bottom: -2px;">&nbsp;&nbsp;{$_DELIMITER_LABEL|@vtranslate:$MODULE}</label>
                    {/foreach}
                </div>
            </div>
            {if $MULTI_CURRENCY}
                <div class="row" id="lineitem_currency_container" style="height:50px">
                    <div class=" col-md-4 col-sm-12 col-xs-12">{vtranslate('LBL_IMPORT_LINEITEMS_CURRENCY',$MODULE)}</div>
                    <div class=" col-md-8 col-sm-12 col-xs-12">
                        <select name="lineitem_currency" id="lineitem_currency" class = "select2">
                            {$i = 0}
                            {foreach key=id item=CURRENCY from=$CURRENCIES}
                                <option value="{$CURRENCY['currency_id']}">{$CURRENCY['currencycode']}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            {/if}
        {/if}
    </div>
</div>
