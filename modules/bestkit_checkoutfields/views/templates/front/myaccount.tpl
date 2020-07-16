{extends file='page.tpl'}

{block name='page_title'}
  {l s='Additional Information' mod='bestkit_checkoutfields'}
{/block}

{block name='page_content'}
{capture name=path}
		<a href="{$link->getPageLink('my-account', true)|escape:'htmlall':'UTF-8'}" rel="nofollow" title="{l s='My Account' mod='bestkit_checkoutfields'}">{l s='My Account' mod='bestkit_checkoutfields'}</a>
		<span class="navigation-pipe">&gt;</span>
		{l s='Additional Information' mod='bestkit_checkoutfields'}
{/capture}
	
{if isset(Context::getContext()->cookie->bestkit_errors)}
	{if Context::getContext()->cookie->bestkit_errors eq false}
		<p class="alert alert-success">
			{l s='Your additional information has been successfully updated.' mod='bestkit_checkoutfields'}
		</p>
	{else}
		<p class="alert alert-danger">
			{Context::getContext()->cookie->bestkit_errors}
		</p>		
	{/if}
	{Context::getContext()->cookie->unsetFamily('bestkit_errors')}
{/if}
<div class="box">
	<form action="{$link->getModuleLink('bestkit_checkoutfields', 'myaccount')}" method="post" id="account-creation_form" enctype="multipart/form-data">
		{include file="module:bestkit_checkoutfields/views/templates/hook/account.tpl"}
		<br><br>
		<button class="btn btn-primary form-control-submit pull-xs-right" data-link-action="save-customer" type="submit">
	        {l s='Save' mod='bestkit_checkoutfields'}
	    </button>
	</form>
</div>
{/block}
{block name='page_footer'}
  {block name='my_account_links'}
    {include file='customer/_partials/my-account-links.tpl'}
  {/block}
{/block}
<script>
	window.onload = function() {
	(function($){
		$('#customer-form').attr('enctype', 'multipart/form-data');
		$('.bestkit_date').datepicker();
	})(jQuery);
	};
</script>