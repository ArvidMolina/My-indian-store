<link href="{$authCSS}" rel="stylesheet" type="text/css" media="all" />
<link href="{$modCSS}" rel="stylesheet" type="text/css" media="all" />
<form action="#" method="post" id="account-creation_form" class="panel" enctype="multipart/form-data">
	{if isset($postState)}
		<p class="alert {$postState|escape:'htmlall':'UTF-8'}">
			{if $postState eq 'alert-success'}
				{l s='Your additional information has been successfully updated.' mod='bestkit_checkoutfields'}
			{else}
				{$errors}
			{/if}
		</p>
	{/if}
	{include file="./account.tpl"}
	<p class="cart_navigation required submit">
		<input type="submit" name="submitAccount" id="submitAccount" value="{l s='Save' mod='bestkit_checkoutfields'}" class="exclusive">
		<span><sup>*</sup>{l s='Required field' mod='bestkit_checkoutfields'}</span>
	</p>
</form>
<br>
<div class="separation"></div>