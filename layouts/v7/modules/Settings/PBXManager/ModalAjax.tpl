{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}
{strip}
<script type="text/javascript" src="layouts/v7/modules/Vtiger/resources/Edit.js"></script>
<div id="gpsContainer" class='modelContainer col-sm-12 col-xs-12 content-area '>
    <div id="ModalContainer" class="modal-dialog">
        {assign var=HEADER_TITLE value={vtranslate('Add Phone Number To An Existing Record', $QUALIFIED_MODULE)}}
        {include file="ModalHeader.tpl"|vtemplate_path:$QUALIFIED_MODULE TITLE=$HEADER_TITLE}
        <form class="modal-content recordEditView" name="QuickCreate" id="QuickAddPhone" method="post" action="index.php">
                <div class="modal-body tabbable slimScrollDiv">
                    <div class="row">
                        <table class="massEditTable table no-border">
                            <tbody>
                            <tr>
                                <td class="fieldLabel col-lg-2 control-label"></td>
                                <td class="fieldLabel col-lg-4 control-label">
                                       <span class="pull-right">
                                            <label>{vtranslate("Caller Phone Number", $QUALIFIED_MODULE)}</label>
                                        </span>
                                </td>
                                <td class="fieldValue col-lg-6">{$PHONE}
                                </td>
                            </tr>
                            <tr>
                                   <td class="fieldLabel col-lg-2 control-label"></td>
                                   <td class="fieldLabel col-lg-4 control-label">
                                       <span class="pull-right">
                                                    <select style="width:150px;" class="select2 referenceModulesList">
                                                        {foreach item=value from=$referenceList}
                                                            <option value="{$value}">{vtranslate($value, $value)}</option>
                                                        {/foreach}
                                                    </select>
                                                </span>
                                   </td>
                                   <td class="fieldValue col-lg-6">
                                       {strip}
                                           <div class="referencefield-wrapper">
                                               <input id="popupReferenceModuleSelect" name="popupReferenceModule" type="hidden" value="{$referenceList[0]}"/>
                                               {assign var="displayId" value=$RECORD}
                                               <div class="input-group">
                                                   <input name="module" type="hidden" value="{$QUALIFIED_MODULE}" />
                                                   <input name="action" type="hidden" value="IncomingCallPoll"/>
                                                   <input name="mode" type="hidden" value="addtoexistingrecord"/>
                                                   <input name="recordid" type="hidden" value="{$PBXMANAGERID}"/>
                                                   <input name="phone" type="hidden" value="{$PHONE}" />
                                                   <input id="related_to_select" name="related_to" type="hidden" value="{$RECORD}" class="sourceField" data-displayvalue='{$RECORD}'/>
                                                   <input id="related_to_display" name="related_to_display" data-fieldname="related_to" data-fieldtype="reference" type="text"  class="marginLeftZero autoComplete inputElement"  value="{$LABEL}"  placeholder="{vtranslate('LBL_TYPE_SEARCH',$QUALIFIED_MODULE)}" />
                                                   <a href="#" class="clearReferenceSelection {if $RECORD eq 0}hide{/if}"> x </a>
                                                   <span class="input-group-addon relatedPopup cursorPointer" title="{vtranslate('LBL_SELECT', $QUALIFIED_MODULE)}"><i id="{$QUALIFIED_MODULE}_editView_fieldName_related_to_select" class="fa fa-search"></i></span>
                                               </div>
                                           </div>
                                       {/strip}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="textAlignCenter col-lg-12 col-md-12 col-sm-12 ">
                        <button class="btn btn-success" type="submit"  >
                           <strong>{vtranslate('Add Phone Number To Record Manually', $QUALIFIED_MODULE)}</strong></button>
                        <button class="btn btn-primary" type="reset" id="saveAutoRecord"  >
                           <strong>{vtranslate('Add Phone Number To Record Automatically', $QUALIFIED_MODULE)}</strong></button>
                        <a class="cancelLink" type="reset"
                           onclick="javascript:jQuery('.modal').modal('hide');">{vtranslate('Cancel', $QUALIFIED_MODULE)}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            var Vtiger_Edit = new Vtiger_Edit_Js();
            Vtiger_Edit.registerBasicEvents($('#QuickAddPhone'));
            $("#QuickAddPhone").submit(function(e){
                if ($( "input[name='related_to']" ).val() == "") {
                    app.helper.showErrorNotification({ 'message': '{vtranslate('Please select a record',$QUALIFIED_MODULE)}' });
                    e.preventDefault();
                    return false;
                } else {
                    return true;
                }
            });
            $('#saveAutoRecord').click(function () {
                app.helper.showProgress();
                var related_to = $('#related_to_select').val();
                var popupReferenceModule = $('#popupReferenceModuleSelect').val();
                if(related_to == '' || popupReferenceModule == ''){
                    app.helper.hideProgress();
                    app.helper.showErrorNotification({ 'message': '{vtranslate('Please select a record',$QUALIFIED_MODULE)}' });
                    return  false;
                }
                var requrl = 'index.php?module={$QUALIFIED_MODULE}&action=IncomingCallPoll&mode=addToExistingRecordAjax&recordid={$PBXMANAGERID}&phone={$PHONE}&related_to='+related_to+'&popupReferenceModule='+popupReferenceModule;
                {literal}
                app.request.get({url: requrl}).then(function (err, data) {
                    if (err === null) {
                        if(data.success){
                            app.helper.showSuccessNotification({ 'message': data.message });
                            window.location.reload()
                        }else{
                            app.helper.showErrorNotification({ 'message': data.error });
                        }
                    }
                    app.helper.hideProgress();
                });
                {/literal}
                return false;
            })
        });
    </script>

{/strip}
