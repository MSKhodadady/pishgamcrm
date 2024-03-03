<?php /* Smarty version Smarty-3.1.7, created on 2023-07-30 13:58:31
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/crm/version 7.1.2 FA/onRun/includes/runtime/../../layouts/v7/modules/SMSNotifier/StatusWidget.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42239541764c66c87c57c24-07005239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcb419f233ebc0866f0d911ad05e636f0411e690' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/crm/version 7.1.2 FA/onRun/includes/runtime/../../layouts/v7/modules/SMSNotifier/StatusWidget.tpl',
      1 => 1524051256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42239541764c66c87c57c24-07005239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'STATUSRECORDS' => 0,
    'ST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_64c66c87d7198',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64c66c87d7198')) {function content_64c66c87d7198($_smarty_tpl) {?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<div>
		<table width="100%" cellpadding="3" cellspacing="1" border="0" class="lvt small">

			<?php  $_smarty_tpl->tpl_vars['ST'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ST']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['STATUSRECORDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ST']->key => $_smarty_tpl->tpl_vars['ST']->value){
$_smarty_tpl->tpl_vars['ST']->_loop = true;
?>
			<tr>
				<td  style="font-family:tahoma;font-size:12px;" nowrap="nowrap" bgcolor="<?php echo $_smarty_tpl->tpl_vars['ST']->value['statuscolor'];?>
" width="25%"><?php echo $_smarty_tpl->tpl_vars['ST']->value['tonumber'];?>
     >  <?php echo $_smarty_tpl->tpl_vars['ST']->value['statusmessage'];?>
</td>
			</tr>
			<?php } ?>

		</table>
	</div>
<?php }} ?>