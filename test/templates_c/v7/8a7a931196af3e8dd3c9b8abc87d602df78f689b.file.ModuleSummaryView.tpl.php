<?php /* Smarty version Smarty-3.1.7, created on 2023-05-29 13:00:36
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/crm/version 7.1.2 FA/onRun/includes/runtime/../../layouts/v7/modules/Vtiger/ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6486467236474a1f4eeb3e5-55522559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a7a931196af3e8dd3c9b8abc87d602df78f689b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/crm/version 7.1.2 FA/onRun/includes/runtime/../../layouts/v7/modules/Vtiger/ModuleSummaryView.tpl',
      1 => 1520234494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6486467236474a1f4eeb3e5-55522559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'SUMMARY_RECORD_STRUCTURE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6474a1f4f17a5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6474a1f4f17a5')) {function content_6474a1f4f17a5($_smarty_tpl) {?>



<div class="recordDetails">
    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['SUMMARY_RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>

</div><?php }} ?>