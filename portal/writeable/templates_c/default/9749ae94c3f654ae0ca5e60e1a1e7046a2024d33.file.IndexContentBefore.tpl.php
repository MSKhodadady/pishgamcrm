<?php /* Smarty version Smarty-3.1.19, created on 2018-03-15 15:58:24
         compiled from "D:\wamp\www\vt71fa\portal\layouts\default\templates\HelpDesk\partials\IndexContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40145aaa8a10e46327-54365851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9749ae94c3f654ae0ca5e60e1a1e7046a2024d33' => 
    array (
      0 => 'D:\\wamp\\www\\vt71fa\\portal\\layouts\\default\\templates\\HelpDesk\\partials\\IndexContentBefore.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40145aaa8a10e46327-54365851',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5aaa8a111079a3_43377498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaa8a111079a3_43377498')) {function content_5aaa8a111079a3_43377498($_smarty_tpl) {?>


<div class="navigation-controls-row">
<div ng-if="checkRecordsVisibility(filterPermissions)" class="panel-title col-md-12 module-title">{{ptitle}}
</div>
</div>
    <div class="row portal-controls-row">
        <div class="col-lg-2 col-md-2 col-sm-8 col-xs-8">
        <div ng-if="!checkRecordsVisibility(filterPermissions)" class="panel-title col-md-12 module-title">{{ptitle}}</div>
            <div class="btn-group btn-group-justified" ng-if="checkRecordsVisibility(filterPermissions)">
                <div class="btn-group">
                    <button type="button" translate="Mine"
                            ng-class="{'btn btn-default btn-primary':searchQ.onlymine, 'btn btn-default':!searchQ.onlymine}" ng-click="searchQ.onlymine=true">Mine</button>
                </div>
                <div class="btn-group">
                    <button type="button" translate="All"
                            ng-class="{'btn btn-default btn-primary':!searchQ.onlymine, 'btn btn-default':searchQ.onlymine}" ng-click="searchQ.onlymine=false">All</button>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
            <div class="btn-group addbtnContainer" ng-if="isCreatable">
                <button type="button" translate= "New Ticket" class="btn btn-primary" ng-click="create()"></button>
            </div>
        </div>
        <!--<div class="hidden-md hidden-lg" style="height: 20px;"></div>-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="row" ng-if="activateStatus">
                <hp-selectric items="ticketStatus" ng-model="searchQ.ticketstatus"></hp-selectric>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <button ng-if="records" class="btn btn-primary" ng-csv="exportRecords(module)" csv-header="csvHeaders" add-bom="true" filename="{{filename}}.csv">{{'Export'|translate}}&nbsp;{{ptitle}}</button>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pagination-holder">
            <div class="pull-right">
                <div class="text-center">
                    <pagination
                        total-items="totalPages" max-size="3" ng-model="currentPage" ng-change="pageChanged(currentPage)" boundary-links="true">
                    </pagination>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="table-header" ng-show="pageInitialized"><h4>Tickets {{searchQ.type}</h4></div> -->
      <input name="visited" type="hidden" ng-init="beforeRefresh='0'" ng-model="beforeRefresh">

<?php }} ?>
