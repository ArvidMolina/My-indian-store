{**
*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*         DISCLAIMER   *
* *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
* versions in the future.
* ****************************************************
*}

<div class="checkout_field {if $checkout_field.required}required{/if} {$checkout_field.field_type|escape:'htmlall':'UTF-8'} form-group">
    <label for="checkout_field_{$checkout_field.id_bestkit_checkout_field|escape:'htmlall':'UTF-8'}">{$checkout_field.name|escape:'htmlall':'UTF-8'} {if $checkout_field.required}<sup>*</sup>{/if}</label>
	{if !empty($checkout_field.description)}<span class="checkout_field_desc">{$checkout_field.description nofilter}</span>{/if}
    <select name="checkout_field[{$checkout_field.id_bestkit_checkout_field|escape:'htmlall':'UTF-8'}]" id="checkout_field_{$checkout_field.id_bestkit_checkout_field|intval}" attr-id="{$checkout_field.id_bestkit_checkout_field|intval}" class="form-control checkout_field_value checkout_field_step_{$checkout_field_step|escape:'htmlall':'UTF-8'}">
		<option value="">{l s='--' mod='bestkit_checkoutfields'}</option>
		<option value="{$yes_lang|escape:'htmlall':'UTF-8'}" {if $yes_lang == $checkout_field.selected_value}selected="selected"{/if}>{l s='Yes' mod='bestkit_checkoutfields'}</option>
		<option value="{$no_lang|escape:'htmlall':'UTF-8'}" {if $no_lang == $checkout_field.selected_value}selected="selected"{/if}>{l s='No' mod='bestkit_checkoutfields'}</option>
    </select>
</div>