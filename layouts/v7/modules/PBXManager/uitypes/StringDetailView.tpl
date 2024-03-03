{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is: vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}

{* TODO: Review the order of parameters - good to eliminate $RECORD->getId, $RECORD should be used *}
{if $FIELD_MODEL->getFieldDataType() eq 'picklist' and $MODULE neq 'Users'}
    {assign var=PICKLIST_COLOR value=Settings_Picklist_Module_Model::getPicklistColorByValue($FIELD_MODEL->getName(), $FIELD_MODEL->get('fieldvalue'))}
    <span {if !empty($PICKLIST_COLOR)} class="picklist-color" style="background-color: {$PICKLIST_COLOR}; line-height:15px; color: {Settings_Picklist_Module_Model::getTextColor($PICKLIST_COLOR)};" {/if}>
                {assign var=FIELDVAL value=$FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'), $RECORD->getId(), $RECORD)}
        {if method_exists('ParsVT_Module_Model', 'FixRTL') && $FIELD_MODEL->getFieldDataType() eq 'string'}{ParsVT_Module_Model::FixRTL($FIELDVAL)}{else}{$FIELDVAL}{/if}
    </span>
{else if $FIELD_MODEL->getFieldDataType() eq 'multipicklist' and $MODULE neq 'Users'}
    {assign var=PICKLIST_DISPLAY_VALUE value=$FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'), $RECORD->getId(), $RECORD)}
    {assign var=MULTI_RAW_PICKLIST_VALUES value=explode('|##|',$FIELD_MODEL->get('fieldvalue'))}
    {assign var=MULTI_PICKLIST_VALUES value=explode(',',$PICKLIST_DISPLAY_VALUE)}
    {foreach item=MULTI_PICKLIST_VALUE key=MULTI_PICKLIST_INDEX from=$MULTI_RAW_PICKLIST_VALUES}
        {assign var=PICKLIST_COLOR value=Settings_Picklist_Module_Model::getPicklistColorByValue($FIELD_MODEL->getName(), trim($MULTI_PICKLIST_VALUE))}
        <span class="picklist-color" {if !empty($PICKLIST_COLOR)} style="background-color: {$PICKLIST_COLOR}; color: {Settings_Picklist_Module_Model::getTextColor($PICKLIST_COLOR)};" {/if}> {trim($MULTI_PICKLIST_VALUES[$MULTI_PICKLIST_INDEX])} </span>
        {if $MULTI_PICKLIST_VALUES[$MULTI_PICKLIST_INDEX+1] neq ''},{/if}
    {/foreach}
{else if $FIELD_MODEL->get('label') eq 'Currency' || $FIELD_MODEL->get('label') eq 'Language' || $FIELD_MODEL->get('uitype') == '26'}
    {vtranslate($FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'), $RECORD->getId(), $RECORD), $MODULE)}
{else if $FIELD_MODEL->getFieldDataType() eq 'currency'}
    {assign var=CURRENT_USER_MODEL value=Users_Record_Model::getCurrentUserModel()}
    {assign var=SYMBOL_PLACEMENT value=$CURRENT_USER_MODEL->get('currency_symbol_placement')}
    {if ($FIELD_MODEL->get('uitype') eq '72') && ($FIELD_MODEL->getName() eq 'unit_price')}
        {assign var=CURRENCY_SYMBOL value=$BASE_CURRENCY_SYMBOL}
    {else if $FIELD_MODEL->get('uitype') eq '71'}
        {assign var=CURRENCY_INFO value=getCurrencySymbolandCRate($CURRENT_USER_MODEL->get('currency_id'))}
        {assign var=CURRENCY_SYMBOL value=$CURRENCY_INFO['symbol']}
    {/if}
    {if $SYMBOL_PLACEMENT eq '$1.0'}
        {$CURRENCY_SYMBOL}&nbsp;
        <span class="currencyValue">{$FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'))}</span>
    {else}
        <span class="currencyValue">{$FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'))}</span>
        &nbsp;{$CURRENCY_SYMBOL}
    {/if}
{else if  $FIELD_MODEL->get('name') eq 'signature'}
    {decode_html($FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'), $RECORD->getId(), $RECORD))}
{else}
    {assign var=FIELDVAL value=$FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'), $RECORD->getId(), $RECORD)}
    {if method_exists('ParsVT_Module_Model', 'FixRTL') && $FIELD_MODEL->getFieldDataType() eq 'string'}{ParsVT_Module_Model::FixRTL(vtranslate($FIELDVAL, $MODULE))}{else}{vtranslate($FIELDVAL, $MODULE)}{/if}
{/if}