<?php /* Smarty version Smarty-3.1.19, created on 2018-05-19 17:10:43
         compiled from "D:\wamp\www\vt71voip\portal\layouts\default\templates\Portal\partials\DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99315b003e73247500-38809084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70c46918bc672cdb6b0c936cd7eab100053aebd5' => 
    array (
      0 => 'D:\\wamp\\www\\vt71voip\\portal\\layouts\\default\\templates\\Portal\\partials\\DetailContentBefore.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99315b003e73247500-38809084',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b003e732a8fa9_42543498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b003e732a8fa9_42543498')) {function content_5b003e732a8fa9_42543498($_smarty_tpl) {?>


    <div class="col-lg-12 col-md-12 col-sm-7 col-xs-7 detail-header detail-header-row">
      <h3 class="fsmall">
        <detail-navigator>
          <span>
            <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}
            </a>
            </span>
        </detail-navigator>{{record[header]}}
        <button ng-if="isEditable" class="btn btn-primary attach-files-ticket" ng-click="editRecord(module,id)">{{'Edit'|translate}} {{ptitle}}</button>
      </h3>
    </div>
</div>

<hr class="hrHeader">
<div class="container-fluid">

<?php }} ?>
