<?php /* Smarty version Smarty-3.1.19, created on 2018-04-28 00:27:57
         compiled from "D:\wamp\www\vt71voip\portal\layouts\default\templates\Documents\partials\IndexContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70625ae3a3ed66fcb4-73215732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4851aeef614f4f0202bc8eaf70fb312a94541c2' => 
    array (
      0 => 'D:\\wamp\\www\\vt71voip\\portal\\layouts\\default\\templates\\Documents\\partials\\IndexContentBefore.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70625ae3a3ed66fcb4-73215732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5ae3a3ed6ae4c9_71281359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ae3a3ed6ae4c9_71281359')) {function content_5ae3a3ed6ae4c9_71281359($_smarty_tpl) {?>


<div class="navigation-controls-row">
<div ng-if="checkRecordsVisibility(filterPermissions)" class="panel-title col-md-12 module-title">{{ptitle}}
</div>
</div>
    <div class="row portal-controls-row">
      <div ng-if="!checkRecordsVisibility(filterPermissions)" class="panel-title col-md-12 module-title">{{ptitle}}</div>
        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-8" ng-if="checkRecordsVisibility(filterPermissions)">
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                    <button type="button"
                            ng-class="{'btn btn-default btn-primary':searchQ.onlymine, 'btn btn-default':!searchQ.onlymine}" ng-click="searchQ.onlymine=true">{{'Mine' | translate}}</button>
                </div>
                <div class="btn-group">
                    <button type="button"
                            ng-class="{'btn btn-default btn-primary':!searchQ.onlymine, 'btn btn-default':searchQ.onlymine}" ng-click="searchQ.onlymine=false">{{'All' | translate}}</button>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
            <div class="btn-group addbtnContainer" ng-if="isCreateable">
                <button type="button" class="btn btn-primary addBtn" ng-click="create()">{{'Add Document' | translate}}</button>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pagination-holder pull-right">
            <div class="pull-right">
                <div class="text-center">
                    <pagination
                        total-items="totalPages" max-size="3" ng-model="currentPage" ng-change="pageChanged(currentPage)" boundary-links="true">
                    </pagination>
                </div>
            </div>
        </div>
    </div>

<?php }} ?>
