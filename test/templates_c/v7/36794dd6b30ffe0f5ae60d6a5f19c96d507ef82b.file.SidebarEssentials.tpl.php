<?php /* Smarty version Smarty-3.1.7, created on 2020-11-22 12:58:56
         compiled from "/home/iranpartocms/public_html/v7.1.1/includes/runtime/../../layouts/v7/modules/RecycleBin/partials/SidebarEssentials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16287735905fba60903851c9-72978617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36794dd6b30ffe0f5ae60d6a5f19c96d507ef82b' => 
    array (
      0 => '/home/iranpartocms/public_html/v7.1.1/includes/runtime/../../layouts/v7/modules/RecycleBin/partials/SidebarEssentials.tpl',
      1 => 1527245014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16287735905fba60903851c9-72978617',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_LIST' => 0,
    'MODULEMODEL' => 0,
    'SOURCE_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5fba609039674',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fba609039674')) {function content_5fba609039674($_smarty_tpl) {?>
<div class="sidebar-menu sidebar-menu-full">
    <div class="module-filters" id="module-filters">
        <div class="sidebar-container lists-menu-container">
            <h5 class="sidebar-header"> <?php echo vtranslate('LBL_MODULES','Settings:$MODULE');?>
 </h5>
            <hr>
            <div>
                <input class="search-list" type="text" placeholder="جستجوی ماژول ها">
            </div>
            <div class="list-menu-content">
                <div class="list-group">
                    <ul class="lists-menu" style="list-style-type: none; padding-left: 0px;">
                        <?php if (count($_smarty_tpl->tpl_vars['MODULE_LIST']->value)>0){?>
                            <?php  $_smarty_tpl->tpl_vars['MODULEMODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULEMODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODULE_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULEMODEL']->key => $_smarty_tpl->tpl_vars['MODULEMODEL']->value){
$_smarty_tpl->tpl_vars['MODULEMODEL']->_loop = true;
?>
                                <li style="font-size:12px;" class='listViewFilter <?php if ($_smarty_tpl->tpl_vars['MODULEMODEL']->value->getName()==$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value){?>active<?php }?> '>
                                    <a class="filterName" href="index.php?module=RecycleBin&view=List&sourceModule=<?php echo $_smarty_tpl->tpl_vars['MODULEMODEL']->value->getName();?>
" ><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULEMODEL']->value->getName(),$_smarty_tpl->tpl_vars['MODULEMODEL']->value->getName());?>
</a>
                                </li>
                            <?php } ?>
                        <?php }?>
                    </ul>
                 </div>
                <div class="list-group hide noLists">
                    <h6 class="lists-header"><center> <?php echo vtranslate('LBL_NOTHING');?>
 <?php echo vtranslate('LBL_MODULE','Settings:$MODULE');?>
<?php echo vtranslate('LBL_PY');?>
 <?php echo vtranslate('LBL_NOT_FOUND');?>
 ... </center></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>