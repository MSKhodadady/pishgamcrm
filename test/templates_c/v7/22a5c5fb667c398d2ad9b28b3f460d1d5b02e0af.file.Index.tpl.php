<?php /* Smarty version Smarty-3.1.7, created on 2020-11-22 13:42:27
         compiled from "/home/iranpartocms/public_html/v7.1.1/includes/runtime/../../layouts/v7/modules/Settings/Vtiger/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6447357945fba6ac30f9ef3-01423522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22a5c5fb667c398d2ad9b28b3f460d1d5b02e0af' => 
    array (
      0 => '/home/iranpartocms/public_html/v7.1.1/includes/runtime/../../layouts/v7/modules/Settings/Vtiger/Index.tpl',
      1 => 1524861304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6447357945fba6ac30f9ef3-01423522',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'USERS_COUNT' => 0,
    'ACTIVE_WORKFLOWS' => 0,
    'ACTIVE_MODULES' => 0,
    'SETTINGS_SHORTCUTS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5fba6ac314d53',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fba6ac314d53')) {function content_5fba6ac314d53($_smarty_tpl) {?>
<div class="settingsIndexPage col-lg-12 col-md-12 col-sm-12"><div><h4><?php echo vtranslate('LBL_SUMMARY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></div><hr><div class="row"><span class="col-lg-4 col-md-4 col-sm-4 col-xs-12 settingsSummary"><a href="index.php?module=Users&parent=Settings&view=List"><h2 class="summaryCount"><?php echo $_smarty_tpl->tpl_vars['USERS_COUNT']->value;?>
</h2><p class="summaryText" style="margin-top:20px;"><?php echo vtranslate('LBL_ACTIVE_USERS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</p></a></span><span class="col-lg-4 col-md-4 col-sm-4 col-xs-12 settingsSummary"><a href="index.php?module=Workflows&parent=Settings&view=List&parentblock=LBL_AUTOMATION"><h2 class="summaryCount"><?php echo $_smarty_tpl->tpl_vars['ACTIVE_WORKFLOWS']->value;?>
</h2><p class="summaryText" style="margin-top:20px;"><?php echo vtranslate('LBL_WORKFLOWS_ACTIVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</p></a></span><span class="col-lg-4 col-md-4 col-sm-4 col-xs-12 settingsSummary"><a href="index.php?module=ModuleManager&parent=Settings&view=List"><h2 class="summaryCount"><?php echo $_smarty_tpl->tpl_vars['ACTIVE_MODULES']->value;?>
</h2><p class="summaryText" style="margin-top:20px;"><?php echo vtranslate('LBL_MODULES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</p></a></span></div><br><br>&nbsp;<h4><?php echo vtranslate('LBL_SETTINGS_SHORTCUTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4><hr><div id="settingsShortCutsContainer" style="min-height: 500px;"><div class="row"><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?><?php  $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUTS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->key => $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value){
$_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->_loop = true;
?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SettingsShortCut.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php } ?></div></div></div>
<?php }} ?>