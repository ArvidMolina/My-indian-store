{*
* Registration
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FME Modules.
*
*  @author    FME Modules
*  @copyright 2017 fmemodules All right reserved
*  @license   FMM Modules
*  @package   Registration
*}
<link rel="stylesheet" type="text/css" href="{$css_dir|escape:'htmlall':'UTF-8'}identity.css">
{if isset($conf) AND $conf AND $conf == 1}
<div class="alert alert-success success conf">
	{if $version >=1.6}
		<button data-dismiss="alert" class="close" type="button">×</button>
	{/if}
	{l s='Successful update' mod='registrationfields'}
</div>
{/if}
{include file="$tpl_dir./errors.tpl"}
<div id="identity" class="box">
	<form id="update_registration_form" class="std" action="{$link->getModuleLink('registrationfields', 'myinfo')|escape:'htmlall':'UTF-8'}" name="update_registration" method="POST" enctype="multipart/form-data">
		<fieldset id="registration_fields" class="account_creation form-group" style="border: none;">
			{foreach from=$summary_fields item=field}
				<div class="clearfix"></div>
				<div class="rf_input_wrapper required form-group text form-group row">
		            <label class="rf_input_label {if $field['value_required']} required {/if}{if $version >= 1.7}col-md-3{/if} form-control-label">
		            	{if $field['value_required'] AND $version >= 1.7}<span style="color: #FF5555!important">*</span>{/if}
		            	{$field['field_name']|escape:'htmlall':'UTF-8'}</label>
					<div class="{if $version >= 1.7}col-md-6{/if}">
					{assign var='field_value' value=Fields::getFormatedValue($field, null, $id_customer, $id_guest)}
					{if $field['field_type'] eq 'text'}
						{assign var="text_default_value" value=$field['default_value']}
						{if $field.editable == 0}
								{if isset($field_value) AND $field_value}
									<span class="form-control">{$field_value|escape:'htmlall':'UTF-8'}</span>
								{else}
									<input type="text" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" value=""  class="text {if $field['value_required']}is_required {/if}{if isset($field['field_validation']) AND $field['field_validation'] }validate_field{/if} form-control" {if isset($field['field_validation']) AND $field['field_validation']} data-validate="{$field['field_validation']|escape:'htmlall':'UTF-8'}"{/if}/>
								{/if}
						{else}
							<input type="text" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]"
							value="{if !empty($field_value) AND $field_value}{$field_value|escape:'htmlall':'UTF-8'}{elseif !empty($text_default_value) AND $text_default_value}{$text_default_value|escape:'htmlall':'UTF-8'}{/if}"
							class="text {if $field['value_required']}is_required {/if}{if isset($field['field_validation']) AND $field['field_validation'] }validate_field{/if} form-control" {if isset($field['field_validation']) AND $field['field_validation']} data-validate="{$field['field_validation']|escape:'htmlall':'UTF-8'}"{/if}/>
						{/if}

					{elseif $field['field_type'] eq 'textarea'}
						{assign var="texta_default_value" value=$field['default_value']}
						{if $field.editable == 0}

								{if isset($field_value) AND $field_value}
									<span class="form-control">{$field_value|escape:'htmlall':'UTF-8'}</span>
								{else}
									<textarea name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" class="form-control {if $field['value_required']}is_required{/if}" {if isset($field['field_validation']) AND $field['field_validation']}data-validate="{$field['field_validation']|escape:'htmlall':'UTF-8'}"{/if}></textarea>
								
								{/if}
						{else}
							<textarea name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" class="form-control {if $field['value_required']}is_required{/if}" {if isset($field['field_validation']) AND $field['field_validation']}data-validate="{$field['field_validation']|escape:'htmlall':'UTF-8'}"{/if}>{if !empty($field_value) AND $field_value}{$field_value|escape:'htmlall':'UTF-8'}{elseif !empty($text_default_value) AND $text_default_value}{$text_default_value|escape:'htmlall':'UTF-8'}{/if}</textarea>
						{/if}

					{elseif $field['field_type'] eq 'date'}
						{if $field.editable == 0}

							{if isset($field_value) AND $field_value}
								<span class="form-control">{$field_value|escape:'htmlall':'UTF-8'}</span>
							{else}
								<input class="fields_datapicker form-control {if $field['value_required']} is_required {/if} validate_field" type="text" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" value="" data-validate="isDate"/>
							{/if}
						{else}
							<input class="fields_datapicker form-control {if $field['value_required']} is_required {/if} validate_field"
			                type="text"
			                name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]"
			                value="{if !empty($field_value) AND $field_value}{$field_value|escape:'htmlall':'UTF-8'}{/if}"
			                data-validate="isDate"/>
						{/if}

					{elseif $field['field_type'] eq 'boolean'}

						{if $field.editable == 0}
		                    {if isset($field_value) AND $field_value}
		                        <span class="form-control">{$field_value|escape:'htmlall':'UTF-8'}</span>
		                    {else}
		                        <select class="select form-control {if $field['value_required']}is_required {/if}" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" >
		                        <option value="No">{l s='No' mod='registrationfields'}</option>
		                        <option value="Yes">{l s='Yes' mod='registrationfields'}</option>
		                    </select>
		                    {/if}
		                {else}
							<select class="select form-control {if $field['value_required']}is_required {/if}" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" >
								<option value="No" {if !empty($field_value) AND $field_value == 'No'}selected="selected"{/if}>{l s='No' mod='registrationfields'}</option>
								<option value="Yes" {if !empty($field_value) AND $field_value == 'Yes'}selected="selected"{/if}>{l s='Yes' mod='registrationfields'}</option>
							</select>
		                {/if}

					{elseif $field.field_type eq 'select'}

			            {if $field.editable == 0}
			                {if isset($field_value) AND $field_value}
			                    {$field_value = FieldsModel::getFieldsValueById($field_value)}
			                    <span class="form-control">{$field_value|escape:'htmlall':'UTF-8'}</span>
			                {else}
			                    <select class="select form-control {if $field['value_required']}is_required {/if}" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" >
			                    <option value="">{l s='Select Option' mod='registrationfields'}</option>
			                    {foreach from=$summary_fields_values[$field['id_custom_field']] item=summary_fields_value}
			                        <option value="{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">{$summary_fields_value['field_value']|escape:'htmlall':'UTF-8'}
			                        </option>
			                    {/foreach}
			                </select>
			                {/if}
			            {else}
							<select class="select form-control {if $field['value_required']}is_required {/if}" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" >
								<option value="">{l s='Select Option' mod='registrationfields'}</option>
								{foreach from=$summary_fields_values[$field['id_custom_field']] item=summary_fields_value}
									<option value="{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"
			                        {if isset($field_value) AND $summary_fields_value.field_value_id == $field_value}selected="selected"{/if}>{$summary_fields_value['field_value']|escape:'htmlall':'UTF-8'}
									</option>
								{/foreach}
							</select>
			            {/if}

					{elseif $field['field_type'] eq 'radio'}
						<input class="rf_checkboxes" type="hidden" data-required="{$field['value_required']}" value="{count($field_value)}">
						{if $field.editable == 0}
		                    {if isset($field_value) AND $field_value}
		                        <span class="form-control">
		                        	{if isset($field_value) AND is_array($field_value)}
		                        		{Fields::getOptionValue(implode(',',$field_value))|escape:'htmlall':'UTF-8'}
		                        	{/if}
		                        </span>
		                    {else}
		                        {foreach from=$summary_fields_values[$field['id_custom_field']] item=summary_fields_value}
		                            <div class="type_multiboxes col-lg-1" id="uniform-{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">
		                                <input type="radio"
		                                id="radio_{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"
		                                class="form-control {if $field['value_required']}is_required {/if}"
		                                name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}][]"
		                                value="{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"/>
		                            </div>
		                            <label class="type_multiboxes col-lg-8 top" for="radio_{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">
		                                {$summary_fields_value['field_value']|escape:'htmlall':'UTF-8'}
		                            </label>
		                            <div class="clearfix"></div>
		                        {/foreach}
		                    {/if}
		                {else}
							{foreach from=$summary_fields_values[$field['id_custom_field']] item=summary_fields_value}
		                        <div class="type_multiboxes col-lg-1" id="uniform-{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">
		                            <input type="radio"
		                            id="radio_{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"
		                            class="form-control {if $field['value_required']}is_required {/if}"
		                            name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}][]"
		                            value="{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"
		                            {if isset($field_value) AND is_array($field_value) && in_array($summary_fields_value.field_value_id, $field_value)}checked="checked"{/if}
		                            />
		                        </div>
		                        <label class="type_multiboxes col-lg-8 top" for="radio_{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">
		                        	{$summary_fields_value['field_value']|escape:'htmlall':'UTF-8'}
								</label>
		                        <div class="clearfix"></div>
							{/foreach}
		                {/if}

					{elseif $field['field_type'] eq 'checkbox'}
						<input class="rf_checkboxes" type="hidden" data-required="{$field['value_required']}" value="{count($field_value)}">
						{if $field.editable == 0}
		                    {if isset($field_value) AND $field_value}
		                        <span class="form-control">
		                        	{if isset($field_value) AND is_array($field_value)}
		                        		{Fields::getOptionValue(implode(',',$field_value))|escape:'htmlall':'UTF-8'}
		                        	{/if}
		                        </span>
		                    {else}
		                        {foreach from=$summary_fields_values[$field['id_custom_field']] item=summary_fields_value}
		                            <div class="type_multiboxes checker col-lg-1" id="uniform-{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">
		                                <input type="checkbox"
		                                value="{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"
		                                name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}][]" id="checkbox_{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"
		                                class="{if $field['value_required']}is_required{/if}"/>
		                            </div>
		                            <label class="type_multiboxes col-lg-8" for="checkbox_{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">
		                                {$summary_fields_value['field_value']|escape:'htmlall':'UTF-8'}
		                            </label>
		                            <div class="clearfix"></div>
		                    	{/foreach}
		                    {/if}
		                {else}
							{foreach from=$summary_fields_values[$field['id_custom_field']] item=summary_fields_value}

		                            <div class="type_multiboxes col-lg-1" id="uniform-{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">
		                                <input type="checkbox"
		                                value="{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"
		                                name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}][]" id="checkbox_{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}"
		                                class="{if $field['value_required']}is_required{/if} form-control"
		                                {if isset($field_value) AND is_array($field_value) AND in_array($summary_fields_value.field_value_id, $field_value)}checked="checked"{/if}
		                                />
		                            </div>
									<label class="type_multiboxes col-lg-7" for="checkbox_{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">
		                                {$summary_fields_value['field_value']|escape:'htmlall':'UTF-8'}
									</label>
		                            <div class="clearfix"></div>

							{/foreach}
		                {/if}

					{elseif $field['field_type'] eq 'multiselect'}
		                <input class="rf_checkboxes" type="hidden" data-required="{$field['value_required']}" value="{count($field_value)}">
		                {if $field.editable == 0}
		                    {if isset($field_value) AND $field_value}
		                        <span class="form-control">
		                        	{if isset($field_value) AND is_array($field_value)}
		                        		{Fields::getOptionValue(implode(',',$field_value))|escape:'htmlall':'UTF-8'}
		                        	{/if}
		                    	</span>
		                    {else}
		                        <select name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}][]" multiple="multiple" class="type_multiboxes multiselect form-control {if $field['value_required']}is_required {/if}">
		                            {foreach from=$summary_fields_values[$field['id_custom_field']] item=summary_fields_value}
		                                <option value="{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}">{$summary_fields_value['field_value']|escape:'htmlall':'UTF-8'}
		                                </option>
		                            {/foreach}
		                        </select>
		                        <p><small>{l s='Hold CTRL/Command key to select multiple values.' mod='registrationfields'}</small></p>
		                    {/if}
		                {else}
							<select name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}][]" multiple="multiple" class="type_multiboxes multiselect form-control {if $field['value_required']}is_required {/if}">
								{foreach from=$summary_fields_values[$field['id_custom_field']] item=summary_fields_value}
									<option value="{$summary_fields_value['field_value_id']|escape:'htmlall':'UTF-8'}" {if isset($field_value) AND is_array($field_value) AND in_array($summary_fields_value.field_value_id, $field_value)}selected="selected"{/if}>{$summary_fields_value['field_value']|escape:'htmlall':'UTF-8'}
		                            </option>
								{/foreach}
							</select>
							<p><small>{l s='Hold CTRL/Command key to select multiple values.' mod='registrationfields'}</small></p>
		                {/if}

					{elseif $field['field_type'] eq 'image'}
							<div id="field_image_{$field['id_custom_field']|escape:'htmlall':'UTF-8'}">
							{assign var='root_dir' value=($smarty.const._PS_ROOT_DIR_|cat:'/')}
							{if $field.editable == 0}
								{assign var='field_value' value=''}
								{if isset($value_reg_fields) AND $value_reg_fields}
									{foreach from=$value_reg_fields item=field_edit}
									
										{if !empty($field_edit) AND $field_edit AND $field_edit['id_custom_field'] == $field['id_custom_field'] AND !empty($field_edit['value'])}
											{assign var='field_value' value=$field_edit['value']|replace:$root_dir:''}
										{/if}
									
									{/foreach}
								{else}
									{assign var='field_value' value=''}
								{/if}

								{if isset($field_value) AND $field_value}
									<img id="preview-image-{$field['id_custom_field']|escape:'htmlall':'UTF-8'}" class="image_container" src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}{$field_value|escape:'htmlall':'UTF-8'}">
								{else}
									<img id="preview-{$field['id_custom_field']|escape:'htmlall':'UTF-8'}" class="image_container" src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}modules/registrationfields/views/img/empty.png">
									<input type="file" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" id="image_{$field['id_custom_field']|escape:'htmlall':'UTF-8'}" class="image_input {if $field['value_required']}is_required {/if}{if isset($field['field_validation']) AND $field['field_validation'] }validate_field{/if}" {if isset($field['field_validation']) AND $field['field_validation']} data-validate="{$field['field_validation']|escape:'htmlall':'UTF-8'}"{/if} {if isset($field.extensions) AND $field.extensions} data-extensions="{$field.extensions|escape:'htmlall':'UTF-8'}"{/if} data-id="{$field['id_custom_field']|escape:'htmlall':'UTF-8'}">
									<p class="alert alert-danger error extension_error">{l s='Image type not allowed.' mod='registrationfields'}</p>
								{/if}
							{else}
									<img id="preview-{$field['id_custom_field']|escape:'htmlall':'UTF-8'}" class="image_container" src="{if !empty($value_reg_fields) AND $value_reg_fields}{foreach from=$value_reg_fields item=field_edit}{if !empty($field_edit) AND $field_edit AND $field_edit['id_custom_field'] == $field['id_custom_field'] AND !empty($field_edit['value'])}{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}{$field_edit.value|replace:$root_dir:''|escape:'htmlall':'UTF-8'}{/if}{/foreach}{else}{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}modules/registrationfields/views/img/empty.png{/if}" title="{l s='Click here to upload image' mod='registrationfields'}">
									<input type="file" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}]" id="image_{$field['id_custom_field']|escape:'htmlall':'UTF-8'}" class="image_input {if $field['value_required']}is_required {/if}{if isset($field['field_validation']) AND $field['field_validation'] }validate_field{/if}" {if isset($field['field_validation']) AND $field['field_validation']} data-validate="{$field['field_validation']|escape:'htmlall':'UTF-8'}"{/if} {if isset($field.extensions) AND $field.extensions} data-extensions="{$field.extensions|escape:'htmlall':'UTF-8'}"{/if} data-id="{$field['id_custom_field']|escape:'htmlall':'UTF-8'}">
									{if isset($field.extensions) AND $field.extensions} <p>{l s='Allowed file types' mod='registrationfields'}: {$field.extensions|escape:'htmlall':'UTF-8'}</p>{/if}
									<p class="alert alert-danger error extension_error">{l s='Image type not allowed.' mod='registrationfields'}</p>
							{/if}
							</div>

					{elseif $field['field_type'] eq 'attachment'}
							<div id="field_attachment_{$field['id_custom_field']|escape:'htmlall':'UTF-8'}">
							{assign var='root_dir' value=($smarty.const._PS_ROOT_DIR_|cat:'/')}
							{if $field.editable == 0}
								{assign var='field_value' value=''}
								{if isset($value_reg_fields) AND $value_reg_fields}
									{foreach from=$value_reg_fields item=field_edit}
									
										{if !empty($field_edit) AND $field_edit AND $field_edit['id_custom_field'] == $field['id_custom_field'] AND !empty($field_edit['value'])}
											{assign var='field_value' value=$field_edit['value']|replace:$root_dir:''}
										{/if}
									
									{/foreach}
								{else}
									{assign var='field_value' value=''}
								{/if}

								{if isset($field_value) AND $field_value}
									<a class="btn button btn-primary" href="{$actionLink|escape:'htmlall':'UTF-8'}&field={base64_encode({$field.id_custom_field|escape:'htmlall':'UTF-8'})}">{pathinfo($field_value|escape:'htmlall':'UTF-8', $smarty.const.PATHINFO_FILENAME)}
									</a>
									<br>
								{else}
									<img id="preview-{$field.id_custom_field|escape:'htmlall':'UTF-8'}" class="image_container" src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}modules/registrationfields/views/img/empty.png">
									<input type="file" name="fields[{$field.id_custom_field|escape:'htmlall':'UTF-8'}]" value="{if !empty($value_reg_fields) AND $value_reg_fields}{foreach from=$value_reg_fields item=field_edit}{if !empty($field_edit) AND $field_edit AND $field_edit.id_custom_field == $field.id_custom_field AND !empty($field_edit['value'])}{$field_edit['value']|escape:'htmlall':'UTF-8'}{/if}{/foreach}{elseif empty($value_reg_fields) AND !empty($text_default_value) AND $text_default_value}{$text_default_value|escape:'htmlall':'UTF-8'}{/if}"  class="form-control attachment {if $field['value_required']}is_required {/if}{if isset($field['field_validation']) AND $field['field_validation'] }validate_field{/if}" {if isset($field['field_validation']) AND $field['field_validation']} data-validate="{$field['field_validation']|escape:'htmlall':'UTF-8'}"{/if} {if isset($field.extensions) AND $field.extensions} data-extensions="{$field.extensions|escape:'htmlall':'UTF-8'}"{/if}>
									{if isset($field.extensions) AND $field.extensions} <p>{l s='Allowed file types' mod='registrationfields'}: {$field.extensions|escape:'htmlall':'UTF-8'}</p>{/if}
									<p class="alert alert-danger error extension_error">{l s='Image type not allowed.' mod='registrationfields'}</p>
								{/if}
							{else}
								{if !empty($value_reg_fields) AND $value_reg_fields}
									{foreach from=$value_reg_fields item=field_edit}
										{if !empty($field_edit) AND $field_edit AND $field_edit['id_custom_field'] == $field['id_custom_field'] AND !empty($field_edit['value'])}
											<a class="btn button btn-primary" href="{$actionLink|escape:'htmlall':'UTF-8'}&field={base64_encode({$field.id_custom_field|escape:'htmlall':'UTF-8'})}">{pathinfo($field_edit.value|replace:$root_dir:''|escape:'htmlall':'UTF-8', $smarty.const.PATHINFO_FILENAME)}</a>
											<br>
										{/if}
									{/foreach}
								{/if}
								<input type="file" name="fields[{$field.id_custom_field|escape:'htmlall':'UTF-8'}]" value="{if !empty($value_reg_fields) AND $value_reg_fields}{foreach from=$value_reg_fields item=field_edit}{if !empty($field_edit) AND $field_edit AND $field_edit.id_custom_field == $field.id_custom_field AND !empty($field_edit['value'])}{$field_edit['value']|escape:'htmlall':'UTF-8'}{/if}{/foreach}{elseif empty($value_reg_fields) AND !empty($text_default_value) AND $text_default_value}{$text_default_value|escape:'htmlall':'UTF-8'}{/if}"  class="form-control attachment {if $field['value_required']}is_required {/if}{if isset($field['field_validation']) AND $field['field_validation'] }validate_field{/if}" {if isset($field['field_validation']) AND $field['field_validation']} data-validate="{$field['field_validation']|escape:'htmlall':'UTF-8'}"{/if} {if isset($field.extensions) AND $field.extensions} data-extensions="{$field.extensions|escape:'htmlall':'UTF-8'}"{/if}>
								{if isset($field.extensions) AND $field.extensions} <p>{l s='Allowed file types' mod='registrationfields'}: {$field.extensions|escape:'htmlall':'UTF-8'}</p>{/if}
								<p class="alert alert-danger error extension_error">{l s='Image type not allowed.' mod='registrationfields'}</p>
								{/if}
							</div>

					{elseif $field['field_type'] eq 'message'}
						<div class="alert alert-{if isset($field['alert_type']) && $field['alert_type'] && $field['alert_type'] == 'error'}danger {$field['alert_type']|escape:'htmlall':'UTF-8'}{else}{$field['alert_type']|escape:'htmlall':'UTF-8'}{/if}">
							{$field['default_value']|escape:'htmlall':'UTF-8'}
						</div>
						<input type="hidden" name="fields[{$field['id_custom_field']|escape:'htmlall':'UTF-8'}][]" value="{$field['default_value']|escape:'htmlall':'UTF-8'}" />
					{/if}
					</div>
					<div class="clearfix"></div>
				</div>
			{/foreach}
			<!-- consent box -->
			<div class="form-group row">
				<label class="col-lg-3"></label>
				<div class="col-lg-9">
					{hook h='displayGDPRConsent' mod='psgdpr' id_module=$id_module}
				</div>
			</div>
			<div class="clearfix form-group margin-form"></div>
				<label class="col-lg-3"></label>
				<div class="col-lg-9">
					{if $version >= 1.6}
						<button id="updateFields" class="btn btn-default button button-medium btn-primary" name="updateFields" type="submit"><span>{l s='Save' mod='registrationfields'}<i class="icon-chevron-right right"></i></span></button>
					{else}
						<p class="submit">
							<input id="updateFields" type="submit" value="{l s='Save' mod='registrationfields'}" name="updateFields" class="button btn btn-primary">
						</p>
					{/if}
				</div>
			</div>
		</fieldset>
	</form>
</div>
{if $version >= 1.6}
<ul class="footer_links clearfix">
	<li>
        <a class="btn btn-default button button-small" href="{$link->getPageLink('my-account', true)|escape:'htmlall':'UTF-8'}">
            <span>
                <i class="icon-chevron-left"></i>{l s='Back to your account' mod='registrationfields'}
            </span>
        </a>
    </li>
	<li>
        <a class="btn btn-default button button-small" href="{$base_dir|escape:'htmlall':'UTF-8'}">
            <span>
                <i class="icon-chevron-left"></i>{l s='Home' mod='registrationfields'}
            </span>
        </a>
    </li>
</ul>
{else}
<ul class="footer_links">
	<li><a href="{$link->getPageLink('my-account', true)|escape:'htmlall':'UTF-8'}"><img src="{$img_dir|escape:'htmlall':'UTF-8'}icon/my-account.gif" alt="" class="icon" /></a><a href="{$link->getPageLink('my-account', true)|escape:'htmlall':'UTF-8'}">{l s='Back to your account' mod='registrationfields'}</a></li>
	<li class="f_right"><a href="{$base_dir|escape:'htmlall':'UTF-8'}"><img src="{$img_dir|escape:'htmlall':'UTF-8'}icon/home.gif" alt="" class="icon" /> {l s='Home' mod='registrationfields'}</a></li>
</ul>
{/if}
