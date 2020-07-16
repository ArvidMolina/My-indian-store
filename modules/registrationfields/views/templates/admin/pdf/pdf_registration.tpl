{**
* Registration Fields
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FME Modules.
*
*  @author    FME Modules
*  @copyright 2018 fmemodules All right reserved
*  @license   FMM Modules
*  @package   Registration Fields
 *}
<!-- registration fields heading -->
 <table id="summary-tab">
	<tr>
		<td class="center grey bold">
			{if $REGISTRATION_FIELDS_HEADING}
				{$REGISTRATION_FIELDS_HEADING|escape:'htmlall':'UTF-8'}
			{else}
				{l s='Registration Fields' mod='registrationfields' pdf=true}
			{/if}
		</td>
	</tr>
</table>
<!-- registration fields -->
<table id="summary-tab">
	{assign var='root_dir' value=($smarty.const._PS_ROOT_DIR_|cat:'/')}
	{foreach from=$groupedFields item=field}
	 {if $field.field_type == 'attachment' || $field.field_type == 'message'}
	 	{continue}
	 {else}
		<tr>
			<td class="left grey bold" width="45%" style="margin-left:15px;">
				{$field.field_name|escape:'htmlall':'UTF-8'}
			</td>
			<td class="left white" width="55%" style="margin-left:15px;">
				{if $field.field_type == 'image' AND $field.value AND file_exists($field.value)}
					{assign var='field_value' value=$field.value|replace:$root_dir:''}
					<img class="imgm img-thumbnail" src="{if $pv < 1.7}{Tools::getShopDomain()}{/if}{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}{$field_value|escape:'htmlall':'UTF-8'}" width="16px">
				{else}
					{Tools::htmlentitiesUTF8($obj->getFormatedValue(($field))|escape:'htmlall':'UTF-8')}
				{/if}
			</td>
		</tr>
	{/if}
	{/foreach}
</table>