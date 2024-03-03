<?php /* Smarty version Smarty-3.1.19, created on 2018-05-19 17:24:52
         compiled from "D:\wamp\www\vt71voip\portal\layouts\default\templates\Project\partials\DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112265b0041c44a3191-00725156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c6bdbce258c285857ab7f67cccb238b9b12f416' => 
    array (
      0 => 'D:\\wamp\\www\\vt71voip\\portal\\layouts\\default\\templates\\Project\\partials\\DetailContentBefore.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112265b0041c44a3191-00725156',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b0041c45378b4_01222174',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0041c45378b4_01222174')) {function content_5b0041c45378b4_01222174($_smarty_tpl) {?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ticket-detail-header-row ">
  <h3 class="fsmall">
    <detail-navigator>
      <span>
        <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}
        </a>
      </span>
    </detail-navigator>
    {{record[header]}}
  <button ng-if="documentsEnabled" translate="Attach document to this project" class="btn btn-primary attach-files-ticket" ng-click="attachDocument('Documents','LBL_ADD_DOCUMENT')"></button></h3>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<script type="text/javascript" src="<?php echo portal_componentjs_file('Documents');?>
"></script>
<?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve('Documents',"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
