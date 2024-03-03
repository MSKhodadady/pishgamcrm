<?php /* Smarty version Smarty-3.1.19, created on 2018-05-19 17:26:15
         compiled from "D:\wamp\www\vt71voip\portal\layouts\default\templates\ProjectTask\partials\DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129695b0042174c92d6-70608600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3df045757a4e050aac5d94ec636c5fa004a9cf52' => 
    array (
      0 => 'D:\\wamp\\www\\vt71voip\\portal\\layouts\\default\\templates\\ProjectTask\\partials\\DetailContentBefore.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129695b0042174c92d6-70608600',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b0042174ffde6_34840425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0042174ffde6_34840425')) {function content_5b0042174ffde6_34840425($_smarty_tpl) {?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ticket-detail-header-row ">
  <h3 class="fsmall">
    <detail-navigator>
      <span>
        <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}
        </a>
      </span>
      </detail-navigator>
      {{record[header]}}
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<?php }} ?>
