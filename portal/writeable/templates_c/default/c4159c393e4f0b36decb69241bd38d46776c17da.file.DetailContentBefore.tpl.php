<?php /* Smarty version Smarty-3.1.19, created on 2018-05-19 17:48:21
         compiled from "D:\wamp\www\vt71voip\portal\layouts\default\templates\Quotes\partials\DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26695b004745b44d08-54429328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4159c393e4f0b36decb69241bd38d46776c17da' => 
    array (
      0 => 'D:\\wamp\\www\\vt71voip\\portal\\layouts\\default\\templates\\Quotes\\partials\\DetailContentBefore.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26695b004745b44d08-54429328',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b004745bba026_45655788',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b004745bba026_45655788')) {function content_5b004745bba026_45655788($_smarty_tpl) {?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ticket-detail-header-row ">
  <h3 class="fsmall">
    <detail-navigator>
      <span>
        <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}</a>
      </span>
    </detail-navigator>
      {{record[header]}}
    <button ng-if="quoteAccepted" translate="Accept Quote" class="btn btn-success close-ticket" ng-click="acceptQuote();"></button>
  </h3>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  
  <script type="text/javascript" src="<?php echo portal_componentjs_file('Documents');?>
"></script>
  <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve('Documents',"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
