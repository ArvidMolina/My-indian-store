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

{if $element_type eq  'headline_text'}
    <p>{l s='We\'ll be back soon.' mod='wkmaintenancemode'}</p>
{/if}
{if $element_type eq  'description_text'}
    <p>{l s='We are currently updating our shop and will be back really soon.' mod='wkmaintenancemode'}</p>
    <p>{l s='Thanks for your patience.' mod='wkmaintenancemode'}</p>
{/if}
{if $element_type eq  'footer_text'}
    <a class="_blank" href="{$data.link}" target="_blank">
      © {$data.year} - Ecommerce software by PrestaShop™
    </a>
{/if}
{if $element_type eq  'layout'}
    <img class="center-block img-thumbnail"
    src="{$data.imagelink}" width="100" alt="layout">
    <a class="image-zoom" href="{$data.imagelink}">
    <i class="icon-search"></i> {l s='Zoom' mod='wkmaintenancemode'}</a>
{/if}
{if $element_type eq  'timer'}
    <img class="center-block img-thumbnail"
    src="{$data.imagelink}" width="100" alt="timer">
    <a class="image-zoom" href="{$data.imagelink}">
    <i class="icon-search"></i> {l s='Zoom' mod='wkmaintenancemode'}</a>
{/if}
{if $element_type eq  'element_desc'}
    <div class="col-lg-12 help-block">{$data.text}</div>
{/if}
{if $element_type eq  'alert'}
    {l s='To manage this module configuration your website must be in maintenance mode.' mod='wkmaintenancemode'}
     {l s='Enable maintenance mode from' mod='wkmaintenancemode'}
    <a href="{$data.link}" target="_blank">
        {l s='here.' mod='wkmaintenancemode'}<i class="icon-external-link"></i>
    </a>
{/if}
