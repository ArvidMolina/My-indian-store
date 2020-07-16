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
    <table style="width: 100%; font-size: 8pt;">
	{foreach $checkout_fields as $step => $nothing}
		<tr style="text-align: left; background-color: #4D4D4D; color: #FFF; padding: 10px 25px; font-weight: bold; width: 50%">
			<td colspan="2" >
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
			</td>
        </tr>
        <tr style="line-height:4px;">
            <td style="text-align: left; background-color: #4D4D4D; color: #FFF; padding: 10px 25px; font-weight: bold; width: 50%">{l s='Field' mod='bestkit_checkoutfields'}</td>
            <td style="background-color: #4D4D4D; color: #FFF; text-align: left; font-weight: bold; width: 50%; padding: 10px 25px;">{l s='Value' mod='bestkit_checkoutfields'}</td>
        </tr>
        <!-- PRODUCTS -->
		{foreach $checkout_fields[$step] as $value}
            <tr style="line-height:6px;{*background-color:{cycle name="bestkit_invoice_row" values="#FFF,#DDD"};*}">
                <td style="text-align: left; width: 50%">{$value.name|escape:'htmlall':'UTF-8'}</td>
                <td style="text-align: left;">{$value.value|escape:'htmlall':'UTF-8'}</td>
            </tr>
        {/foreach}
	{/foreach}
    </table>
{/if}