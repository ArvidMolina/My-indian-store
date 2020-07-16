<div class="account_creation bestkit_customerattributes">
		<input type="hidden" name="bestkit_customerfields" value="1" />
		<input type="hidden" name="bestkit_customer_id" value="{$bestkit_customer_id|escape:'htmlall':'UTF-8'}" />
		<p>{l s='Additional information' mod='bestkit_checkoutfields'}</p>
		{foreach from=$bestkit_attributes item=attribute}
			{assign var=input_name value='bestkit_customerattributes_'|cat:$attribute->code}
			{assign var=customer_value value=$attribute->getCustomerValue($bestkit_customer_id)}
			{*since 1.7*}
			{if empty($customer_value)}
				{assign var=customer_value value=$attribute->default_value}
			{/if}

			<div class="form-group {if $attribute->required eq 1}required {/if}{if $attribute->type eq 'radio'} {elseif $attribute->type eq 'textarea'} textarea{elseif ($attribute->type eq 'multiselect' || $attribute->type eq 'dropdown')}select{else}text{/if} row">

				{if $attribute->type eq 'radio'}
					<div class="clearfix">
					<label class="col-md-3 form-control-label">{$attribute->name|escape:'htmlall':'UTF-8'}{if $attribute->required eq 1} <sup>*</sup>{/if}</label>
					<br>
				{else}
					<label for="{$input_name|escape:'htmlall':'UTF-8'}" class="label-title col-md-3 form-control-label">
						{$attribute->name|escape:'htmlall':'UTF-8'}{if $attribute->required eq 1} <sup>*</sup>{/if}
					</label>
				{/if}
				
				<div class="col-md-6 form-control-valign">

				{if $attribute->type eq 'text'}
					<input type="text" class="text form-control" id="{$input_name|escape:'htmlall':'UTF-8'}" name="{$input_name|escape:'htmlall':'UTF-8'}" value="{$customer_value|escape:'htmlall':'UTF-8'}"{if $attribute->required eq 1} required{/if}{if $attribute->readonly eq 1} readonly="true"{/if}>
				{elseif $attribute->type eq 'textarea'}
					<textarea name="{$input_name|escape:'htmlall':'UTF-8'}" id="{$input_name|escape:'htmlall':'UTF-8'}" class="form-control"{if $attribute->required eq 1} required{/if}{if $attribute->readonly eq 1} readonly="true"{/if}>{$customer_value|escape:'htmlall':'UTF-8'}</textarea>
				{elseif $attribute->type eq 'date'}
					<input type="text" class="text bestkit_date form-control" id="{$input_name|escape:'htmlall':'UTF-8'}" name="{$input_name|escape:'htmlall':'UTF-8'}" value="{$customer_value|escape:'htmlall':'UTF-8'}"{if $attribute->required eq 1} required{/if}{if $attribute->readonly eq 1} readonly="true"{/if}>
				{elseif $attribute->type eq 'radio'}
					{foreach from=$attribute->getValues() item=value key=id}
						<label class="radio-inline">
							<span class="custom-radio">
								<input type="radio" name="{$input_name|escape:'htmlall':'UTF-8'}" id="{$input_name|escape:'htmlall':'UTF-8'}_{$id|escape:'htmlall':'UTF-8'}" value="{$value|escape:'htmlall':'UTF-8'}"{if $customer_value eq $value} checked="checked"{/if} class="form-control">
								<span></span>
							</span>
							{$value}
						</label>
					{/foreach}
					</div>
				{elseif $attribute->type eq 'multiselect'}
					<select name="{$input_name|escape:'htmlall':'UTF-8'}[]" id="{$input_name|escape:'htmlall':'UTF-8'}" multiple="multiple" size="5" style="width: 372px;" class="form-control">
						{foreach from=$attribute->getValues() item=value key=id}
							<option {if in_array($value, $customer_value)}selected="selected" {/if}value="{$value|escape:'htmlall':'UTF-8'}">{$value|escape:'htmlall':'UTF-8'}</option>
						{/foreach}
					</select>
				{elseif $attribute->type eq 'dropdown'}
					<select name="{$input_name|escape:'htmlall':'UTF-8'}" id="{$input_name|escape:'htmlall':'UTF-8'}" style="width: 372px;" class="form-control">
						{foreach from=$attribute->getValues() item=value key=id}
							<option {if $customer_value eq $value}selected="selected" {/if}value="{$value|escape:'htmlall':'UTF-8'}">{$value|escape:'htmlall':'UTF-8'}</option>
						{/foreach}					
					</select>
				{elseif $attribute->type eq 'image'}
					<input type="file" name="{$input_name|escape:'htmlall':'UTF-8'}" id="{$input_name|escape:'htmlall':'UTF-8'}" />
					{if $customer_value}
						<br>
						<a target="_blank" href="{BestKitCustomerFields::getFileUrl($bestkit_customer_id, $customer_value, $attribute->type)}">
							<img class="attach img" src="{BestKitCustomerFields::getFileUrl($bestkit_customer_id, $customer_value, $attribute->type)}?cache={time()}" />
						</a>
					{/if}
				{elseif $attribute->type eq 'attachment'}
					<input type="file" name="{$input_name|escape:'htmlall':'UTF-8'}" id="{$input_name|escape:'htmlall':'UTF-8'}" download />
					{if $customer_value}<br/>
						<a class="attach link" href="{BestKitCustomerFields::getFileUrl($bestkit_customer_id, $customer_value, $attribute->type)}">{l s='Download the uploaded file' mod='bestkit_checkoutfields'}</a>
					{/if}
				{/if}
				
				</div>
				<div class="col-md-3 form-control-comment"></div>
			</div>
		{/foreach}
</div>

