<?php /* Smarty version Smarty-3.1.19, created on 2018-03-15 16:09:56
         compiled from "D:\wamp\www\vt71fa\portal\layouts\default\templates\Portal\partials\DetailContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102785aaa8cc4c12063-29054714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9fc6c69ebf47955ce7b191cf7ae5fe6ae76a748' => 
    array (
      0 => 'D:\\wamp\\www\\vt71fa\\portal\\layouts\\default\\templates\\Portal\\partials\\DetailContent.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102785aaa8cc4c12063-29054714',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5aaa8cc4c31473_95978683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaa8cc4c31473_95978683')) {function content_5aaa8cc4c31473_95978683($_smarty_tpl) {?>


    <div ng-class="{'col-lg-5 col-md-5 col-sm-12 col-xs-12 leftEditContent':splitContentView, 'col-lg-12 col-md-12 col-sm-12 col-xs-12 leftEditContent nosplit':!splitContentView}">
        <div class="container-fluid">
            <div class="row">
                <div class="row detailRow" ng-hide="fieldname=='id' || fieldname=='identifierName' || fieldname=='{{header}}' || fieldname=='documentExists' || fieldname=='referenceFields'"  ng-repeat="(fieldname, value) in record">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label class="fieldLabel" translate="{{fieldname}}"> {{fieldname}} </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <!-- <span class="label label-default">{{value}}</span> -->
                        <span style="white-space: pre-line;" class="value detail-break">{{value}}</span>
                    </div>
                </div>
                <div class="row detailRow" ng-if="module == 'Documents'">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label ng-if="module=='Documents'" class="fieldLabel" translate="Attachments">Attachments</label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" ng-if="documentExists">

                        <button class="btn btn-primary" ng-click="downloadFile(module,id,parentId)" title="Download {{record[header]}}">Download</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }} ?>
