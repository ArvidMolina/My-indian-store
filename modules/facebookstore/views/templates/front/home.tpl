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
<script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
  FB.init({
    appId: '{$app_id|escape:'htmlall':'UTF-8'}', // App ID
  });
  FB.Canvas.setAutoGrow(230);
}
</script>

{include file='module:facebookstore/views/templates/front/common.tpl'}

<body class="bootstrap" dir="en_GB" scroll="no">
{if $profile[0]['status'] == '1'}
<div class="fb_container">
   {include file='module:facebookstore/views/templates/front/header.tpl'}
  <div class="row">
      <div class="" id="file1-images-thumbnails">
         <div>
            <img id="bannerimage1" src="{$profile[0]['banner_path']|escape:'html':'UTF-8'}" width="100%;" height="400px;">
         </div>
      </div>
     
   </div>
   
    {if !empty($products)}
   <div class="row">
      <div class="card1" style="margin:15px;">
         <div class="card-header">
            <h3 class="card-title">{l s='Featured Products' mod='facebookstore'}</h3>
         </div>
         <div class="card-block">
             {if $profile[0]['product_image_size']== 'small'}
                 <div id="fbproducts_small">
                    <ul class="clearfix">
                        {foreach $products key=numStep item=pro}
                         <li>
                          <div style="height:40px;">
                          <h5><a style="line-height:20px;" class="subcategory-name" href="{$pro['link'] nofilter}" target="_blank">{$pro['name']|escape:'htmlall':'UTF-8'}</a></h5>{*Variable contains url, escape not required*}
                          </div>
                          <p>{$pro['price']|escape:'htmlall':'UTF-8'}</p>
                          <div class="fbproducts_small-image">
                             <a href="{$pro['link'] nofilter}" title="{$pro['name']|escape:'htmlall':'UTF-8'}" target="_blank" class="img">{*Variable contains url, escape not required*}
                             <img class="replace-2x" src="{$pro['image'] nofilter}" alt="{$pro['name']|escape:'htmlall':'UTF-8'}">{*Variable contains url, escape not required*}
                             </a>
                             <div class="content_price" >
{*                                <button type="button" class="btn btn-default btn-sm" >
*}                                    <a href='{$pro['link'] nofilter}' target="_blank" class="cart-button"><span class="glyphicon glyphicon-shopping-cart"></span> {l s='Add To Cart' mod='facebookstore'}</a>{*Variable contains url, escape not required*}
{*                                </button>
*}                             </div>
                             <div class="clearfix">
                             </div>
                          </div>
                         </li>
                       {/foreach}
                    </ul>
                </div>
             {else}
            <div id="fbproducts">
               <ul class="clearfix">
                   {foreach $products key=numStep item=pro}
                    <li>
                     <div style="height:40px;">
                     <h5><a style="line-height:20px;" class="subcategory-name" href="{$pro['link'] nofilter}" target="_blank">{$pro['name']|escape:'htmlall':'UTF-8'}</a></h5>{*Variable contains url, escape not required*}
                     </div>
                     <p>{$pro['price']|escape:'htmlall':'UTF-8'}</p>
                     <div class="fbproducts-image">
                        <a href="{$pro['link'] nofilter}" title="{$pro['name']|escape:'htmlall':'UTF-8'}" target="_blank" class="img">{*Variable contains url, escape not required*}
                        <img class="replace-2x" src="{$pro['image'] nofilter}" alt="{$pro['name']|escape:'htmlall':'UTF-8'}">{*Variable contains url, escape not required*}
                        </a>
                        <div class="content_price" >
                           <button type="button" class="btn btn-default btn-sm" >
                               <a href='{$pro['link'] nofilter}' target="_blank"><span class="glyphicon glyphicon-shopping-cart"></span> {l s='Add To Cart' mod='facebookstore'}</a>{*Variable contains url, escape not required*}
                           </button>
                        </div>
                        <div class="clearfix">
                        </div>
                     </div>
                    </li>
                  {/foreach}
               </ul>
            </div>
               {/if}
         </div>
      </div>
    {/if}
   </div>
</div>
{else}
    <div class="fb_container">
        <div class="row" style="height:200px;">
            <p>{l s='Page Has been disabled by the admin.' mod='facebookstore'}</p>
        </div>
    </div>
{/if}
</body>


