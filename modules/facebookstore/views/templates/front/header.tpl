{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer tohttp://www.prestashop.com for more information.
* We offer the best and most useful modules PrestaShop and modifications for your online store.
*
* @category  PrestaShop Module
* @author    knowband.com <support@knowband.com>
* @copyright 2017 Knowband
* @license   see file: LICENSE.txt
*
* Description
*
* Front tpl file
*}
<div class="row">
      <div id="header_logo">
          {* Code added by S Anand to open site in new window on clicking logo*}
         <a  target="_blank" href="{$root_url|escape:'quotes'}" title="">{*Variable contains url, escape not required*}
         <img class="logo img-responsive" src="{$profile[0]['shop_logo']}" alt=""{if isset($logo_image_width) && $logo_image_width} width="{$logo_image_width}"{/if}{if isset($logo_image_height) && $logo_image_height} height="{$logo_image_height}"{/if}/>{*Variable contains url, escape not required*}
         </a>
      </div>
        
     <div class="clearfix go_store" style="float:right;margin-right: 18px;background-color: #48649f;margin-top:3.6%;width: 100px;border-radius: 2px;">
         <div class="go_store" style="padding:4px;font-weight: normal;height: 28px;border: 0;border-radius: 2px;/* width: 118px; */">
            <div style="padding-top: 1px;">      
                <a  target="_blank" href="{$root_url|escape:'quotes'}" title=""  style="color:#fff;padding-left: 8px;/* padding-top: 94px; */margin-top: 22px;">{l s='Go To Store' mod='facebookstore'}</a>{*Variable contains url, escape not required*}
            </div>
         </div>
      </div>
      <div style="clear:both"></div>
   </div>
   <div class="row topnav" style="margin-bottom:10px;">
      <ul>
        {foreach $menus key=numStep item=menu}
            {if $numStep== 'home'}
                <li><a href="{$home_link}">{$menu}</a></li>{*Variable contains url, escape not required*}
            {else}
                <li><a href="{$category_url_link|escape:'html':'UTF-8'}{$numStep}">{$menu}</a></li>{*Variable contains url, escape not required*}
            {/if }
        {/foreach}
      </ul>
   </div>