{**
* Registration Fields
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FMM Modules.
*
*  @author    FMM Modules
*  @copyright 2018 FMM Module All right reserved
*  @license   FMM Modules
*  @package   Registration Fields
*}

{extends file="helpers/list/list_header.tpl"}

{block name=leadin}
	<script type="text/javascript">
		$(document).ready(function(){
			$('.datepicker').datepicker();
		})
	</script>
	<div class="panel">
		<div class="panel-heading">{l s='Choose a filter key' mod='registrationfields'}</div>
		<div class="alert alert-info info">{l s='Filter supports Text, Textarea and Date fields only.' mod='registrationfields'}</div>
		<form action="{$REQUEST_URI}" method="post">
			<div class="customerFilters well col-lg-12">
				<div class="col-lg-4 form-group">
					<label class="control-label col-lg-12">{l s='First Name' mod='registrationfields'}</label>
					<div class="col-lg-12">
						<input class="form-control" type="text" name="firstname" value="{if isset($POST) AND $POST AND isset($POST.firstname) AND $POST.firstname}{$POST.firstname|escape:'htmlall':'UTF-8'}{/if}">
					</div>
				</div>
				<div class="col-lg-4 form-group">
					<label class="control-label col-lg-12">{l s='Last Name' mod='registrationfields'}</label>
					<div class="col-lg-12">
						<input class="form-control" type="text" name="lastname" value="{if isset($POST) AND $POST AND isset($POST.lastname) AND $POST.lastname}{$POST.lastname|escape:'htmlall':'UTF-8'}{/if}">
					</div>
				</div>
				<div class="col-lg-4 form-group">
					<label class="control-label col-lg-12">{l s='Email' mod='registrationfields'}</label>
					<div class="col-lg-12">
						<input class="form-control" type="text" name="email" value="{if isset($POST) AND $POST AND isset($POST.email) AND $POST.email}{$POST.email|escape:'htmlall':'UTF-8'}{/if}">
					</div>
				</div>
			</div>
			<div class="clearfix"></div>

			{if isset($fieldLabels) AND $fieldLabels AND count($fieldLabels) > 0}
				<div class="registrationfieldsFilters well col-lg-12">
					{foreach from=$fieldLabels item=field}
						{if isset($field.field_type) AND $field.field_type AND in_array($field.field_type, array('text', 'textarea', 'date'))}
							<div class="col-lg-12 form-group">
								<label class="control-label col-lg-3">
								{if isset($field.field_name) AND $field.field_name}
									{$field.field_name|escape:'htmlall':'UTF-8'}
								{else}
									field_name
									{l s='Field' mod='registrationfields'}&nbsp;{$field.id_custom_field|escape:'htmlall':'UTF-8'}
								{/if}
								</label>
								<div class="col-lg-6">
									<input class="form-control {if isset($field.field_type) AND $field.field_type AND $field.field_type == 'date'}datepicker{/if}" type="text" name="fields[{$field.id_custom_field|escape:'htmlall':'UTF-8'}]" value="{if isset($POST) AND $POST AND isset($POST.fields[$field.id_custom_field]) AND $POST.fields[$field.id_custom_field]}{$POST.fields[$field.id_custom_field]|escape:'htmlall':'UTF-8'}{/if}">
								</div>
							</div>
						{/if}
					{/foreach}
				</div>
				<div class="clearfix"></div>
			{/if}

			<div class="panel-footer">
				<button type="submit" name="cancel" class="btn btn-warning button">
					<i class="icon-eraser"></i>
					{l s='Clear Filter' mod='registrationfields'}
				</button>
				<button type="submit" class="btn btn-success button" name="submitFilterFields">
					<i class="icon-filter"></i>
					{l s='Filter List' mod='registrationfields'}
				</button>
			</div>
		</form>
	</div>

{/block}
