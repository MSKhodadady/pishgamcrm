<?php /* Smarty version Smarty-3.1.19, created on 2018-05-19 17:34:26
         compiled from "D:\wamp\www\vt71voip\portal\layouts\default\templates\ProjectMilestone\partials\DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120505b004402a24ad5-91014779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cd3510b3b0c4d1e8f66f6fa278b7a51fb95fc11' => 
    array (
      0 => 'D:\\wamp\\www\\vt71voip\\portal\\layouts\\default\\templates\\ProjectMilestone\\partials\\DetailContentBefore.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120505b004402a24ad5-91014779',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b004402a7a9e4_93439620',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b004402a7a9e4_93439620')) {function content_5b004402a7a9e4_93439620($_smarty_tpl) {?>


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
