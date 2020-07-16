{*
*
* 2010-2019 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2019 Webkul IN
*  @license   https://store.webkul.com/license.html
*}

{include file=$smarty.const._PS_MODULE_DIR_|cat:'wkmaintenancemode/views/templates/front/header.tpl'}
<div class="wraper"
{if $background_image}
style="background: url({$background_image|escape:'html':'UTF-8'}?v={$smarty.now|escape:'html':'UTF-8'});background-size: cover;"
{/if}
>
  <div class="head-container">
    <div class="logo">
        {block name='page_header_logo'}
            <div class="logo"><a href="{$smarty.const._PS_BASE_URL_|escape:'html':'UTF-8'}{$smarty.const.__PS_BASE_URI__|escape:'html':'UTF-8'}"><img src="{$shop.logo|escape:'html':'UTF-8'}" alt="logo"/></a></div>
        {/block}
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="content-box col-sm-12 col-md-8 col-lg-8">
        <div class="headline col-sm-12">
            {block name='page_title'}
                {if $maintenance.headline}
                    {$maintenance.headline nofilter}
                {else}
                  {l s='We\'ll be back soon.' mod='wkmaintenancemode'}
                {/if}
            {/block}
        </div>

        <div class="description-text col-sm-12">
            {block name='page_content'}
              {$maintenance.description nofilter}
            {/block}
        </div>
        {if $maintenance.timer}
              {include file='modules/wkmaintenancemode/views/templates/front/'|cat:$maintenance.timer_layout|cat:'.tpl'}
        {/if}
        {if $maintenance.email_subscribe}
        <div class="subscription col-sm-12 top30">
          <div class="subscription-text col-sm-12">
              {l s='Get our latest news and special sales.' mod='wkmaintenancemode'}
          </div>
          <form method="post" class="col-sm-12" action="#subscribe" id="subscribe">
            <div class="form-group">
              <input type="email" name="email" placeholder="{l s='Enter your e-mail' mod='wkmaintenancemode'}" class="col-sm-8 notify-email"/>
            <button type="submit" name="submit" class="col-sm-4 notify-button">{l s='Newsletter' mod='wkmaintenancemode'}</button>
            </div>
          </form>
          {if $subscribe}
          <div class="alert-box col-sm-10">
              <p class="alert {if $subscribe.status}alert-success{else}alert-danger{/if}">
                {$subscribe.message|escape:'html':'UTF-8'}
              </p>
          </div>
          {/if}
        </div>
        {/if}
    </div>
  </div>
 </div>
</div>
<footer>
    {if $maintenance.facebook_link || $maintenance.twitter_link || $maintenance.googleplus_link || $maintenance.instagram_link}
	<div class="share-box">
        {if $maintenance.facebook_link}
    	<a href="{$maintenance.facebook_link|escape:'html':'UTF-8'}" target="_blank" class="facebook" title="Facebook"><img src="{$baseurl|escape:'html':'UTF-8'}modules/wkmaintenancemode/views/img/facebook.png" alt="Facebook"/></a>
        {/if}
        {if $maintenance.twitter_link}
        <a href="{$maintenance.twitter_link|escape:'html':'UTF-8'}" target="_blank" class="twitter" title="Twitter"><img src="{$baseurl|escape:'html':'UTF-8'}modules/wkmaintenancemode/views/img/twitter.png" alt="Twitter"/></a>
        {/if}
        {if $maintenance.googleplus_link}
        <a href="{$maintenance.googleplus_link|escape:'html':'UTF-8'}" target="_blank" class="googleplus" title="Google+"><img src="{$baseurl|escape:'html':'UTF-8'}modules/wkmaintenancemode/views/img/google-plus.png" alt="Google+"/></a>
        {/if}
        {if $maintenance.instagram_link}
        <a href="{$maintenance.instagram_link|escape:'html':'UTF-8'}" target="_blank" class="instagram" title="Instagram"><img src="{$baseurl|escape:'html':'UTF-8'}modules/wkmaintenancemode/views/img/instagram.png" alt="Instagram"/></a>
        {/if}
    </div>
    {/if}
    <div class="copy-text">
        {block name='copyright_link'}
         {$footer_text nofilter}
        {/block}
    </div>
</footer>
{include file=$smarty.const._PS_MODULE_DIR_|cat:'wkmaintenancemode/views/templates/front/footer.tpl'}
