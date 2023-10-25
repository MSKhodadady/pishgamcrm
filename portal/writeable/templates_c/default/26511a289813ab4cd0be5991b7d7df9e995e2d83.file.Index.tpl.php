<?php /* Smarty version Smarty-3.1.19, created on 2018-10-05 21:36:36
         compiled from "D:\wamp\www\vt71voipmodule\portal\layouts\default\templates\Portal\Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:224085bb7bd4472eb92-43850062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26511a289813ab4cd0be5991b7d7df9e995e2d83' => 
    array (
      0 => 'D:\\wamp\\www\\vt71voipmodule\\portal\\layouts\\default\\templates\\Portal\\Index.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224085bb7bd4472eb92-43850062',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5bb7bd448097c4_50579812',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb7bd448097c4_50579812')) {function content_5bb7bd448097c4_50579812($_smarty_tpl) {?>

<div class="container-fluid"  ng-controller="<?php echo portal_componentjs_class($_smarty_tpl->tpl_vars['MODULE']->value,'IndexView_Component');?>
">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContentBefore.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContent.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </div>
</div>
<?php }} ?>
