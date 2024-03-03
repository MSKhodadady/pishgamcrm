{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}

{strip}
	<div class="fc-overlay-modal modal-content">
		<div class="overlayHeader">
			{include file="ModalHeader.tpl"|vtemplate_path:$MODULE TITLE="{'LBL_IMPORT'|@vtranslate:$MODULE} {$FOR_MODULE|@vtranslate:$MODULE} - {'LBL_RESULT'|@vtranslate:$MODULE}"}
			<div class ="modal-body" style="padding-left:15px;">
				<input type="hidden" name="module" value="{$MODULE}" />
				{if $ERROR_MESSAGE neq ''}
					<div class="alert-danger"><h4>{$ERROR_MESSAGE}</h4></div>
				{/if}
				<div style=" width:90%; margin-left:5%" cellpadding="5">
					<div class="row">
						<div valign="top">
							<div class="table table-borderless">
								<div class="row">
									<div class="col-md-6">{'LBL_TOTAL_EVENTS_IMPORTED'|@vtranslate:$MODULE}</div>
									<div class="col-md-1">:</div>
									<div class="col-md-5">{$SUCCESS_EVENTS}</div>
								</div>
								<div class="row">
									<div class="col-md-6">{'LBL_TOTAL_EVENTS_SKIPPED'|@vtranslate:$MODULE}</div>
									<div class="col-md-1">:</div>
									<div class="col-md-5">{$SKIPPED_EVENTS}</div>
								</div>

								<div class="row">
									<div class="col-md-6">{'LBL_TOTAL_TASKS_IMPORTED'|@vtranslate:$MODULE}</div>
									<div class="col-md-1">:</div>
									<div class="col-md-5">{$SUCCESS_TASKS}</div>
								</div>
								<div class="row">
									<div class="col-md-6">{'LBL_TOTAL_TASKS_SKIPPED'|@vtranslate:$MODULE}</div>
									<div class="col-md-1">:</div>
									<div class="col-md-5">{$SKIPPED_TASKS}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-overlay-footer border1px clearfix">
				<div class="row clearfix">
					<div class="textAlignCenter col-lg-12 col-md-12 col-sm-12">
						<button class="btn btn-danger" onclick="return Vtiger_Import_Js.undoImport('index.php?module={$MODULE}&view=Import&mode=undoIcalImport');"><strong>{'LBL_UNDO_LAST_IMPORT'|@vtranslate:$MODULE}</strong></button>
						&nbsp;&nbsp;&nbsp;<button class="btn btn-success" onclick="location.href='index.php?module={$MODULE}&view=List'" ><strong>{'LBL_FINISH'|@vtranslate:$MODULE}</strong></button>
					</div>
				</div>
		</div>
	</div>
{/strip}
