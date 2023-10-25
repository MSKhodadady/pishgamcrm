<?php /* Smarty version Smarty-3.1.19, created on 2018-03-15 16:09:56
         compiled from "D:\wamp\www\vt71fa\portal\layouts\default\templates\Project\partials\ProjectMilestoneContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:225315aaa8cc4e02265-24965284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d7a29af1d52a95378bafb5943d507d2073c660a' => 
    array (
      0 => 'D:\\wamp\\www\\vt71fa\\portal\\layouts\\default\\templates\\Project\\partials\\ProjectMilestoneContent.tpl',
      1 => 1520238616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '225315aaa8cc4e02265-24965284',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5aaa8cc4e15ae2_34566596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaa8cc4e15ae2_34566596')) {function content_5aaa8cc4e15ae2_34566596($_smarty_tpl) {?>


    <div class="cp-table-container" ng-show="projectmilestonerecords">
        <div class="table-responsive">
            <table class="table table-hover table-condensed table-detailed dataTable no-footer">
                <thead>
                    <tr class="listViewHeaders">
                        <th ng-hide="header=='id'" ng-repeat="header in projectmilestoneheaders" nowrap="" class="medium">
                            <a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="{{header}}" translate="{{header}}">{{header}}&nbsp;&nbsp;</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="listViewEntries" ng-repeat="record in projectmilestonerecords">
                        <td ng-hide="header=='id'" ng-repeat="header in projectmilestoneheaders" class="listViewEntryValue medium" nowrap="" style='cursor: pointer;' ng-mousedown="ChangeLocation(record, 'ProjectMilestone')">
                <ng-switch on="record[header].type">
                    <a ng-href="index.php?module=ProjectMilestone&view=Detail&id={{record.id}}"></a>
                    <span ng-switch-default>{{record[header]}}</span>
                </ng-switch>
                </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href="" ng-if="!milestonesLoaded && !noMilestones" ng-click="loadProjectMilestonePage(projectMilestonePageNo)">{{'more'|translate}}...</a>
    <p ng-if="milestonesLoaded" class="text-muted">{{'No Milestones'|translate}}</p>
    <p ng-if="!milestonesLoaded && noMilestones" class="text-muted">{{'No more Milestones'|translate}}</p>

<?php }} ?>
