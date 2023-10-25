{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}
{* modules/Vtiger/views/DashBoard.php *}

{strip}
<div class="dashBoardContainer clearfix">
        <div class="tabContainer">

            <ul class="nav nav-tabs tabs sortable container-fluid visible-lg">
                {foreach key=index item=TAB_DATA from=$DASHBOARD_TABS}
                    <li class="{if $TAB_DATA["id"] eq $SELECTED_TAB}active{/if} dashboardTab" data-tabid="{$TAB_DATA["id"]}" data-tabname="{$TAB_DATA["tabname"]}">
                        <a data-toggle="tab" href="#tab_{$TAB_DATA["id"]}">
                            <div>
                                <span class="name textOverflowEllipsis" value="{$TAB_DATA["tabname"]}" style="width:10%">
                                    <strong>{$TAB_DATA["tabname"]}</strong>
                                </span>
                                <span class="editTabName hide">
                                    <input type="text" name="tabName"/>
                                </span>
                                {if $TAB_DATA["isdefault"] eq 0}
                                    <i class="fa fa-close deleteTab"></i>
                                {/if}
                                <i class="fa fa-bars moveTab hide"></i>
                            </div>
                        </a>
                    </li>
                {/foreach}
                <div class="moreSettings pull-right">
                    <div class="dropdown dashBoardDropDown">
                        <button class="btn btn-default reArrangeTabs dropdown-toggle" type="button" data-toggle="dropdown">{vtranslate('LBL_MORE',$MODULE)}
                            &nbsp;&nbsp;<span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right moreDashBoards">
                            <li id="newDashBoardLi"{if count($DASHBOARD_TABS) eq $DASHBOARD_TABS_LIMIT}class="disabled"{/if}><a class = "addNewDashBoard" href="#">{vtranslate('LBL_ADD_NEW_DASHBOARD',$MODULE)}</a></li>
                            <li><a class = "reArrangeTabs" href="#">{vtranslate('LBL_REARRANGE_DASHBOARD_TABS',$MODULE)}</a></li>
                        </ul>
                    </div>
                    <button class="btn-success updateSequence pull-right hide">{vtranslate('LBL_SAVE_ORDER',$MODULE)}</button>
                </div>
            </ul>

            <div class="sortable container-fluid visible-md visible-sm visible-xs" style="display: none;">
                 <div class="col-md-12 col-sm-12 col-xs-12 text-center padding0px ">
                    <div class="btn-group">
                       <button type="button" class="btn btn-se7en dropdown-toggle" style="width:200px!important;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-paperclip"></i> داشبوردها <i class="fa fa-caret-down"></i></button>
                       <div class="dropdown-backdrop"></div>
                       <ul class="dropdown-menu">
                         {foreach key=index item=TAB_DATA from=$DASHBOARD_TABS}
                             <li class="{if $TAB_DATA["id"] eq $SELECTED_TAB}active{/if} dashboardTab" data-tabid="{$TAB_DATA["id"]}" data-tabname="{$TAB_DATA["tabname"]}">
                                 <a data-toggle="tab" href="#tab_{$TAB_DATA["id"]}">
                                     <div>
                                         <span class="name textOverflowEllipsis" value="{$TAB_DATA["tabname"]}" style="width:10%">
                                             <strong>{$TAB_DATA["tabname"]}</strong>
                                         </span>
                                         <span class="editTabName hide">
                                             <input type="text" name="tabName"/>
                                         </span>
                                         {if $TAB_DATA["isdefault"] eq 0}
                                             <i class="fa fa-close deleteTab"></i>
                                         {/if}
                                         <i class="fa fa-close deleteTab"></i>
                                         <i class="fa fa-bars moveTab hide"></i>
                                     </div>
                                 </a>
                             </li>
                         {/foreach}
                          <!-- <li class="active dashboardTab" data-tabid="17" data-tabname="My Dashboard">
                             <a data-toggle="tab" href="#tab_17">
                                <div><span class="name textOverflowEllipsis" value="My Dashboard" style="width:10%"><span>My Dashboard</span></span><span class="editTabName hide"><input type="text" name="tabName"></span><i class="fa fa-bars moveTab hide"></i></div>
                             </a>
                          </li>
                          <li class=" dashboardTab" data-tabid="19" data-tabname="my 2 dash">
                             <a data-toggle="tab" href="#tab_19">
                                <div><span class="name textOverflowEllipsis" value="my 2 dash" style="width:10%"><span>my 2 dash</span></span><span class="editTabName hide"><input type="text" name="tabName"></span><i class="fa fa-close deleteTab"></i><i class="fa fa-bars moveTab hide"></i></div>
                             </a>
                          </li> -->
                       </ul>
                    </div>
                 </div>
              </div>
            <div class="tab-content">
                {foreach key=index item=TAB_DATA from=$DASHBOARD_TABS}
                    <div id="tab_{$TAB_DATA["id"]}" data-tabid="{$TAB_DATA["id"]}" data-tabname="{$TAB_DATA["tabname"]}" class="tab-pane fade {if $TAB_DATA["id"] eq $SELECTED_TAB}in active{/if}">
                        {if $TAB_DATA["id"] eq $SELECTED_TAB}
                            {include file="dashboards/DashBoardTabContents.tpl"|vtemplate_path:$MODULE TABID=$TABID}
                        {/if}
                    </div>
                {/foreach}
            </div>
        </div>
</div>
{/strip}
