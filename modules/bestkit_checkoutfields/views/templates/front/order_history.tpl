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

{if $checkout_fields}
<!-- Checkout Fields --> 
<div id="order-detail-checkout-fields-box" class="box">
    {*<h3 class="page-heading bottom-indent">
        {l s='Checkout fields' mod='bestkit_checkoutfields'}
    </h3>*}
    <div id="order-detail-checkout-fields-content" class="">
		{foreach $checkout_fields as $step => $nothing}
			<h4 class="page-heading bottom-indent">
				{if $step == 'summary'}
					<i class="icon-shopping-cart"></i>
					{l s='Summary' mod='bestkit_checkoutfields'}
				{else if $step == 'shipping'}
					<i class="icon-truck"></i>
					{l s='Delivery' mod='bestkit_checkoutfields'}
				{else if $step == 'payment'}
					<i class="icon-credit-card"></i>
					{l s='Payment' mod='bestkit_checkoutfields'}
				{else}
					{l s='Other' mod='bestkit_checkoutfields'}
				{/if}
			</h4>
			<dl class="checkout-fields-container">
			{foreach $checkout_fields[$step] as $value}
				<dt class="checkout-fields-item-name" id="checkout-fields-item-name-{$value.id_bestkit_checkout_value|intval}">
					{$value.name|escape:'htmlall':'UTF-8'}:
					{if $value.description}<span class="checkout-fields-item-description">{$value.description nofilter}</span>{/if}
				<dt>
				<dd class="checkout-fields-item-value" id="checkout-fields-item-value-{$value.id_bestkit_checkout_value|intval}">
					{$value.value|escape:'htmlall':'UTF-8'}
				<dd>
			{/foreach}
			</dl>
		{/foreach}
    </div>
</div>
{/if}