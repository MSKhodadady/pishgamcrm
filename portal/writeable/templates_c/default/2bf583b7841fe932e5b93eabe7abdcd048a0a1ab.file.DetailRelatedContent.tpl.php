<?php /* Smarty version Smarty-3.1.19, created on 2018-03-15 16:09:56
         compiled from "D:\wamp\www\vt71fa\portal\layouts\default\templates\Portal\partials\DetailRelatedContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236555aaa8cc4c50878-01699674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bf583b7841fe932e5b93eabe7abdcd048a0a1ab' => 
    array (
      0 => 'D:\\wamp\\www\\vt71fa\\portal\\layouts\\default\\templates\\Portal\\partials\\DetailRelatedContent.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236555aaa8cc4c50878-01699674',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5aaa8cc4d3ed30_75426178',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaa8cc4d3ed30_75426178')) {function content_5aaa8cc4d3ed30_75426178($_smarty_tpl) {?>

<div ng-if="splitContentView" class="col-lg-7 col-md-7 col-sm-12 col-xs-12 rightEditContent">
    
        <ul tabset>
            <tab ng-repeat="relatedModule in relatedModules" select="selectedTab(relatedModule.name)" ng-if="relatedModule.value" heading={{relatedModule.name}} active="tab.active" disabled="tab.disabled">
                <tab-heading><strong translate="{{relatedModule.uiLabel}}">{{relatedModule.uiLabel}}</strong><tab-heading>
						</ul>
                    
                    <br>
                    <div class="tab-content">
                        <div ng-show="selection==='ModComments'">
                            <?php echo $_smarty_tpl->getSubTemplate ("Portal/partials/CommentContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div ng-hide="selection!=='History'"> 
                            <?php echo $_smarty_tpl->getSubTemplate ("Portal/partials/UpdatesContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div ng-hide="selection!=='ProjectTask'"> 
                            <?php echo $_smarty_tpl->getSubTemplate ("Project/partials/ProjectTaskContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div ng-hide="selection!=='ProjectMilestone'"> 
                            <?php echo $_smarty_tpl->getSubTemplate ("Project/partials/ProjectMilestoneContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div ng-hide="selection!=='Documents'"> 
                            <?php echo $_smarty_tpl->getSubTemplate ("Documents/partials/RelatedDocumentsContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                    </div>
                    </div>
<?php }} ?>
