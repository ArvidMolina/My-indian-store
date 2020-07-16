{**
*
* 2007-2016 PrestaShop
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
*
*  @author     BEST-KIT.COM (contact@best-kit.com)
*  @copyright  http://best-kit.com
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if $checkout_fields}
<!-- Checkout Fields -->
<div class="tab-pane" id="bestkit_checkout_fields">
	<form action="{$link->getAdminLink('AdminOrders'|escape:'htmlall':'UTF-8')}&id_order={$id_order|escape:'htmlall':'UTF-8'}&vieworder" method="post" >
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
			<div class="table-responsive">
				<table class="table" id="documents_table">
					<thead>
						<tr>
							<th>
								<span class="title_box "><b>{l s='Field' mod='bestkit_checkoutfields'}</b></span>
							</th>
							<th>
								<span class="title_box "><b>{l s='Value' mod='bestkit_checkoutfields'}</b></span>
							</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						{foreach $checkout_fields[$step] as $value}
						<tr>
							<td>
								{$value.name|escape:'htmlall':'UTF-8'}:
								{if $value.description}<span class="checkout-fields-item-description"><small>{$value.description}</small></span>{/if}
							</td>
							<td>
								<input name="checkout_fields[{$value.id_bestkit_checkout_value|escape:'htmlall':'UTF-8'}]" value="{$value.value|escape:'htmlall':'UTF-8'}">
							</td>
							<td></td>
						</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		{/foreach}
		
		<div class="row">
			<div class="col-lg-8"></div>
			<div class="col-lg-4">
				<button type="submit" name="submitUpdCheckoutFieldsValues" class="btn btn-primary">
					{l s='Update fields values' mod='bestkit_checkoutfields'}
				</button>
			</div>
		</div>
	</form>
	
</div>
{/if}