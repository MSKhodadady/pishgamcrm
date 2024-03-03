<?php /* Smarty version Smarty-3.1.19, created on 2018-10-05 21:36:40
         compiled from "D:\wamp\www\vt71voipmodule\portal\layouts\default\templates\Faq\Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124565bb7bd48163281-16625289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90c9e53fc9d39e174dc26786260e2a5eee5e2997' => 
    array (
      0 => 'D:\\wamp\\www\\vt71voipmodule\\portal\\layouts\\default\\templates\\Faq\\Index.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124565bb7bd48163281-16625289',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5bb7bd481c8ba8_69336816',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb7bd481c8ba8_69336816')) {function content_5bb7bd481c8ba8_69336816($_smarty_tpl) {?>

<div class="container-fluid"  ng-controller="<?php echo portal_componentjs_class($_smarty_tpl->tpl_vars['MODULE']->value,'IndexView_Component');?>
">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContent.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </div>
</div>
<?php }} ?>
