<?php /* Smarty version Smarty-3.1.7, created on 2023-05-27 12:10:02
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/crm/version 7.1.2 FA/onRun/includes/runtime/../../layouts/v7/modules/Vtiger/NoComments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4039574626471f31a349f63-71710364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3366abfbb9f36759812942a747ad369adce22242' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/crm/version 7.1.2 FA/onRun/includes/runtime/../../layouts/v7/modules/Vtiger/NoComments.tpl',
      1 => 1520234494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4039574626471f31a349f63-71710364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6471f31a36825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6471f31a36825')) {function content_6471f31a36825($_smarty_tpl) {?>
<div class="noCommentsMsgContainer noContent"><p class="textAlignCenter"> <?php echo vtranslate('LBL_NO_COMMENTS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</p></div><?php }} ?>