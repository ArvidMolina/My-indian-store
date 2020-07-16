{*
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
*  @package   Registration
*}
{extends file="helpers/form/form.tpl"}

{block name="input"}
	{if $input.type == 'checkbox'}
		{foreach $input.values.query as $value}
			{assign var=id_checkbox value=$value[$input.values.id]}
			<div class="checkbox{if isset($input.expand) && strtolower($input.expand.default) == 'show'} hidden{/if}">
				{strip}
					<label for="checkbox_{$id_checkbox|escape:'htmlall':'UTF-8'}">
						<input type="checkbox" name="{$input.name|escape:'htmlall':'UTF-8'}" id="checkbox_{$id_checkbox|escape:'htmlall':'UTF-8'}" class="{if isset($input.class)}{$input.class|escape:'htmlall':'UTF-8'}{/if}"{if isset($value.val)} value="{$value.val|escape:'html':'UTF-8'}"{/if}{if isset($fields_value[$input.name]) && $fields_value[$input.name] && in_array($id_checkbox, $fields_value[$input.name])} checked="checked"{/if} />
						{$value[$input.values.name]|escape:'htmlall':'UTF-8'}
					</label>
				{/strip}
			</div>
		{/foreach}
	{else if $input.type == 'swap'}
		<div class="form-group">
			<div class="col-lg-9">
				<div class="form-control-static row">
					<div class="col-xs-6">
						<select {if isset($input.size)}size="{$input.size|escape:'html':'utf-8'}"{/if}{if isset($input.onchange)} onchange="{$input.onchange|escape:'html':'utf-8'}"{/if} class="{if isset($input.class)}{$input.class|escape:'html':'utf-8'}{/if}" id="availableSwap" name="{$input.name|escape:'html':'utf-8'}_available[]" multiple="multiple">
						{foreach $input.options.query AS $option}
							{if is_object($option)}
								{if !isset($fields_value[$input.name]) && !in_array($option->$input.options.id, $fields_value[$input.name])}
									<option value="{$option->$input.options.id}">{$option->$input.options.name}</option>
								{/if}
							{elseif $option == "-"}
								<option value="">-</option>
							{else if isset($fields_value[$input.name]) && $fields_value[$input.name]}
								{if !in_array({$option[$input.options.id]}, $fields_value[$input.name])}
									<option value="{$option[$input.options.id]}">{$option[$input.options.name]}</option>
								{/if}
							{else}
								<option value="{$option[$input.options.id]}">{$option[$input.options.name]}</option>
							{/if}
						{/foreach}
						</select>
						<a href="#" id="addSwap" class="btn btn-default btn-block">{l s='Add'  mod='registrationfields'} <i class="icon-arrow-right"></i></a>
					</div>
					<div class="col-xs-6">
						<select {if isset($input.size)}size="{$input.size|escape:'html':'utf-8'}"{/if}{if isset($input.onchange)} onchange="{$input.onchange|escape:'html':'utf-8'}"{/if} class="{if isset($input.class)}{$input.class|escape:'html':'utf-8'}{/if}" id="selectedSwap" name="{$input.name|escape:'html':'utf-8'}" multiple="multiple">
						{foreach $input.options.query AS $option}
							{if is_object($option)}
								{if isset($fields_value[$input.name]) && $fields_value[$input.name] && is_array($fields_value[$input.name]) && in_array($option->$input.options.id, $fields_value[$input.name])}
									<option value="{$option->$input.options.id}">{$option->$input.options.name}</option>
								{/if}
							{elseif $option == "-"}
								<option value="">-</option>
							{else}
								{if isset($fields_value[$input.name]) && $fields_value[$input.name] && is_array($fields_value[$input.name]) && in_array($option[$input.options.id], $fields_value[$input.name])}
									<option value="{$option[$input.options.id]}">{$option[$input.options.name]}</option>
								{/if}
							{/if}
						{/foreach}
						</select>
						<a href="#" id="removeSwap" class="btn btn-default btn-block"><i class="icon-arrow-left"></i> {l s='Remove'  mod='registrationfields'}</a>
					</div>
				</div>
			</div>
		</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}
