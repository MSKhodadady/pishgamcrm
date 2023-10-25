{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is:  vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}
{strip}
    {if !empty($PICKIST_DEPENDENCY_DATASOURCE)}
        <input type="hidden" name="picklistDependency" value='{Vtiger_Util_Helper::toSafeHTML($PICKIST_DEPENDENCY_DATASOURCE)}' />
    {/if}
    <div name='editContent'>
        <div class='fieldBlockContainer'>
            <span>
                <h4 class='fieldBlockHeader' >{vtranslate('SINGLE_EmailTemplates', $MODULE)}</h4>
            </span>
            <hr>
            <div class="table table-borderless">
                <div>
                    <div class="row">
                        <div class="fieldLabel {$WIDTHTYPE} alignMiddle col-md-3 col-sm-12 col-xs-12">{vtranslate('LBL_TEMPLATE_NAME', $MODULE)}&nbsp;<span class="redColor">*</span></div>
                        <div class="fieldValue {$WIDTHTYPE} col-md-3 col-sm-12 col-xs-12">
                            <input id="{$MODULE}_editView_fieldName_templatename" type="text" class="inputElement" data-rule-required="true" name="templatename" value="{$RECORD->get('templatename')}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="fieldLabel {$WIDTHTYPE} alignMiddle col-md-3 col-sm-12 col-xs-12">{vtranslate('LBL_DESCRIPTION', $MODULE)}</div>
                        <div class="fieldValue {$WIDTHTYPE} col-md-3 col-sm-12 col-xs-12">
                            <textarea class="inputElement col-lg-12" id="description" name="description">{$RECORD->get('description')}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='fieldBlockContainer'>
            <span>
                <h4 class='fieldBlockHeader'>{vtranslate('LBL_EMAIL_TEMPLATE', $MODULE)} {vtranslate('LBL_DESCRIPTION', $MODULE)}</h4>
            </span>
            <hr>
            <div class="table table-borderless">
                <div>
                    <div class="row">
                        <div class="fieldLabel {$WIDTHTYPE} col-md-3 col-sm-12 col-xs-12">{vtranslate('LBL_SELECT_FIELD_TYPE', $MODULE)}&nbsp;<span class="redColor">*</span></div>
                        <div class="fieldValue {$WIDTHTYPE} col-md-3 col-sm-12 col-xs-12">
                            <span class="filterContainer" >
                                <input type=hidden name="moduleFields" data-value='{Vtiger_Functions::jsonEncode($ALL_FIELDS)}' />
                                <span class="col-sm-4 col-xs-4 conditionRow">
                                    <select class="inputElement select2" name="modulename" data-rule-required="true">
                                        <option value="">{vtranslate('LBL_SELECT_MODULE',$MODULE)}</option>
                                        {foreach key=MODULENAME item=FIELDS from=$ALL_FIELDS}
                                            <option value="{$MODULENAME}" {if $RECORD->get('module') eq $MODULENAME}selected{/if}>{vtranslate($MODULENAME, $MODULENAME)}</option>
                                        {/foreach}
                                    </select>
                                </span>&nbsp;&nbsp;
                                <span class="col-sm-6 col-xs-6">
                                    <select class="inputElement select2 col-sm-5 col-xs-5" id="templateFields" name="templateFields">
                                        <option value="">{vtranslate('LBL_NONE',$MODULE)}</option>
                                    </select>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fieldLabel {$WIDTHTYPE} col-md-3 col-sm-12 col-xs-12">{vtranslate('LBL_GENERAL_FIELDS', $MODULE)}</div>
                        <div class="fieldValue {$WIDTHTYPE} col-md-3 col-sm-12 col-xs-12">
                            <span class="col-sm-6 col-xs-6">
                                <select class="inputElement select2 col-sm5 col-xs-5" id="generalFields" name="generalFields">
                                    <option value="">{vtranslate('LBL_NONE',$MODULE)}</option>
                                    <optgroup label="{vtranslate('LBL_COMPANY_DETAILS','Settings:Vtiger')}">
                                        {foreach key=index item=COMPANY_FIELD from=$COMPANY_FIELDS}
                                            <option value="{{$COMPANY_FIELD[1]}}">{$COMPANY_FIELD[0]}</option>
                                        {/foreach}
                                    </optgroup>
                                    <optgroup label="{vtranslate('LBL_GENERAL_FIELDS', $MODULE)}">
                                        {foreach key=index item=GENERAL_FIELD from=$GENERAL_FIELDS}
                                            <option value="{$GENERAL_FIELD[1]}">{$GENERAL_FIELD[0]}</option>
                                        {/foreach}
                                    </optgroup>
                                </select>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fieldLabel {$WIDTHTYPE} col-md-3 col-sm-12 col-xs-12">{vtranslate('LBL_SUBJECT', $MODULE)}&nbsp;<span class="redColor">*</span></div>
                        <div class="fieldValue {$WIDTHTYPE} col-md-3 col-sm-12 col-xs-12">
                            <div class="col-sm-6 col-xs-6">
                                <input id="{$MODULE}_editView_fieldName_subject" type="text" {if $IS_SYSTEM_TEMPLATE_EDIT} disabled="disabled" {/if} class="inputElement col-lg-12" data-rule-required="true" name="subject" value="{$RECORD->get('subject')}"  spellcheck="true" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row padding-bottom1per">
                {assign var="TEMPLATE_CONTENT" value=$RECORD->get('body')}
                <textarea id="templatecontent" name="templatecontent" {if $IS_SYSTEM_TEMPLATE_EDIT} data-rule-required="true" {/if} >
                    {if !empty($TEMPLATE_CONTENT)}
                        {$TEMPLATE_CONTENT}
                    {else}
                        {include file="DefaultContentForTemplates.tpl"|@vtemplate_path:$MODULE}
                    {/if}
                </textarea>
            </div>
        </div>
    </div>
