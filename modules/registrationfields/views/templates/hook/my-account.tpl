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
<!-- Registration Fields -->
{if $ps_17 > 0}
<a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" href="{$link->getModuleLink('registrationfields', 'myinfo')|escape:'htmlall':'UTF-8'}">
<span class="link-item">
  <i class="material-icons">&#xE85D;</i>
  {l s='My Registration Information' mod='registrationfields'}
</span>
</a>
{else}
<li class="lnk_registration_fields">
	<a href="{$link->getModuleLink('registrationfields', 'myinfo', array(), true)|escape:'htmlall':'UTF-8'}" title="{l s='My Registration Information' mod='registrationfields'}">
		{if $ps_version < 1.6}
		<img src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}modules/registrationfields/views/img/info.png" alt="{l s='My Registration Information' mod='registrationfields'}" class="icon" />
		{/if}
		<span>{l s='My Registration Information' mod='registrationfields'}</span>
		{if $ps_version >= 1.6}
		<i class="icon-file-text-o"></i>
		{/if}
	</a>
</li>
{/if}
