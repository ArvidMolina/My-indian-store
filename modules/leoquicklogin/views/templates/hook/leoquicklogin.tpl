{* 
* @Module Name: Leo Quick Login
* @Website: leotheme.com.com - prestashop template provider
* @author Leotheme <leotheme@gmail.com>
* @copyright  2007-2018 Leotheme
*}

{if $isLogged}
	<a class="logout" href="{$logout_url}" rel="nofollow">
        <i class="material-icons">&#xE879;</i>      
		<span class="hidden-sm-down">{l s='Sign out' mod='leoquicklogin'}</span>
	</a>
	<a class="account" href="{$my_account_url}" title="{l s='View My Account' mod='leoquicklogin'}" rel="nofollow">
        <i class="material-icons">&#xE7FD;</i>
        <span class="hidden-sm-down">{$customerName}</span>
	</a>
{else}
	{if $leo_type == 'html'}
		{$html_form nofilter}
	{else}
		{if $leo_type == 'dropdown'}
			<div class="dropdown">
		{/if}
		{if $leo_type == 'dropup'}
			<div class="dropup">
		{/if}
				<a href="javascript:void(0)" class="leo-quicklogin{if $leo_type == 'dropdown' || $leo_type == 'dropup'} leo-dropdown dropdown-toggle{/if}" data-enable-sociallogin="{if isset($enable_sociallogin)}{$enable_sociallogin}{/if}" data-type="{$leo_type}" data-layout="{$leo_layout}"{if $leo_type == 'dropdown' || $leo_type == 'dropup'} data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"{/if} title="{l s='Quick Login' mod='leoquicklogin'}" rel="nofollow">
					<i class="material-icons">&#xE851;</i>
					<span class="hidden-sm-down">{l s='Quick Login' mod='leoquicklogin'}</span>
				</a>
		{if $leo_type == 'dropdown' || $leo_type == 'dropup'}
				<div class="dropdown-menu leo-dropdown-wrapper">
					{$html_form nofilter}
				</div>
			</div>
		{/if}
	{/if}
{/if}

