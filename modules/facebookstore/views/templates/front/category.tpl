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
{include file='module:facebookstore/views/templates/front/common.tpl'}
<body class="bootstrap" dir="en_GB" scroll="no">
{if $profile[0]['status'] == '1'}
<div class="fb_container">
 {include file='module:facebookstore/views/templates/front/header.tpl'}
   <div class="row">
        <div id="columns" class="fb_container">
            <div class="breadcrumb clearfix">
                <a class="home" href="{$home_link}" title="{l s='Return to Home' mod='facebookstore'}">{*Variable contains url, escape not required*}
                    <i class="icon-home"></i>
                </a>
                <span class="navigation-pipe">&gt;</span>{$cat_name|escape:'htmlall':'UTF-8'}
            </div>
     {if !empty($products)}
    <div class="card1" style="margin:0px;margin-top:0px;">
        <div class="card-header">
           <h3 class="card-title">{l s='Products' mod='facebookstore'}</h3>
        </div>
        <div class="card-block">
            {if $nb_pages > 1}
                <div class="bottom-pagination-content clearfix">
                    <div class="product-count" style="width:40%;text-align:left;">{l s='Showing' mod='facebookstore'} {$start|escape:'htmlall':'UTF-8'} - {$end|escape:'htmlall':'UTF-8' } {l s='of' mod='facebookstore'} {$total_pages|escape:'htmlall':'UTF-8'} {l s='items' mod='facebookstore'}</div>
                    <!-- Pagination -->
                        <ul class="pagination">
                        {* for left most page *}
                        {if $nb_pages > 1}
                            {assign var=params value=[
                            'category' => $cat_id,
                            'page' => 1
                            ]}
                            {if $page_no neq 1}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                    $params)}">
                                        <span><<</span>
                                    </a>
                                </li>
                            {else}
                                <li class="active current">
                                    <span><span><<</span></span>
                                </li>
                            {/if}    
                        {/if}    
                        {* for 1 page previous to current page *}
                        {if $nb_pages > 1}
                            {if $page_no-1 > 0}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $page_no-1
                                ]}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                    $params)}">
                                    <span><</span>
                                    </a>
                                <li>
                            {else}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => 1
                                ]}
                                {if $page_no neq 1}
                                    <li>
                                        <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                        $params)}">
                                            <span><</span>
                                        </a>
                                    </li>
                                    {else}
                                    <li class="active current">
                                        <span><span><</span></span>
                                    </li>
                                {/if}
                            {/if}    
                        {/if}    
                        {* if at last page then also show last-2 page *} 
                        {if $nb_pages > 1}
                            {if $page_no-2 >= 1 && $page_no eq $nb_pages}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $page_no-2
                                ]}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                        $params)}">
                                        <span>{$page_no-2|escape:'htmlall':'UTF-8'}</span>
                                    </a>
                                </li>    
                            {/if}   
                        {/if}
                        {* for middle of pages *}
                            {for $count=1 to $nb_pages}
                            {assign var=params value=[
                            'category' => $cat_id,
                            'page' => $count
                            ]}
                            {if $count eq $page_no+1 || $count eq $page_no-1 || $page_no eq $count }
                            {if $page_no ne $count}
                                <li>
                                <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                            $params)}">
                                <span>{$count|escape:'htmlall':'UTF-8'}</span>
                                </a>
                                </li>
                                {else}
                                <li class="active current">
                                <span><span>{$count|escape:'htmlall':'UTF-8'}</span></span>
                                </li>
                            {/if}
                            {/if}
                            {/for}
                        {* if  current page is 1 then also show 3rd page if exist *}
                        {if $nb_pages > 1}
                            {if $page_no+2 le $nb_pages && $page_no eq 1}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $page_no+2
                                ]}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                        $params)}">
                                        <span>{$page_no+2|escape:'htmlall':'UTF-8'}</span>
                                    </a>
                                </li>    
                            {/if}   
                        {/if}
                        {* for next page *}
                        {if $nb_pages > 1}
                            {if $page_no+1 < $nb_pages}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $page_no+1
                                ]}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                    $params)}">
                                        <span>></span>
                                    </a>
                                </li>
                            {else}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $nb_pages
                                ]}
                                {if $page_no neq $nb_pages}
                                    <li>
                                        <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                            $params)}">
                                            <span>></span>
                                        </a>
                                    </li>
                                {else}
                                    <li class="active current">
                                        <span><span>></span></span>
                                    </li>
                                {/if}
                            {/if}
                            
                            {* for last page i.e >> *}
                        {/if}    
                        {if $nb_pages > 1}
                            {assign var=params value=[
                            'category' => $cat_id,
                            'page' => $nb_pages
                            ]}
                            {if $page_no neq $nb_pages}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                        $params)}">
                                        <span>>></span>
                                    </a>
                                </li>
                            {else}
                                <li class="active current">
                                    <span><span>>></span></span>
                                </li>
                            {/if}
                        {/if}
                        </ul>
                    <!-- /Pagination -->
                </div>
    {/if}
    <div class="row">
        <div class="card1" style="margin:0 15px;">
                  <div class="card-block">
             {if $profile[0]['product_image_size']== 'small'}
                 <div id="fbproducts_small">
                    <ul class="clearfix">
                        {foreach $products key=numStep item=pro}
                         <li>
                          <div style="height:40px;">
                          <h5><a style="line-height:20px;" class="subcategory-name" href="{$pro['link']}" target="_blank">{$pro['name']|escape:'htmlall':'UTF-8'}</a></h5>{*Variable contains url, escape not required*}
                          </div>
                          <p>{$pro['price']|escape:'htmlall':'UTF-8'}</p>
                          <div class="fbproducts_small-image">
                             <a href="{$pro['link']}" title="{$pro['name']|escape:'htmlall':'UTF-8'}" target="_blank" class="img">{*Variable contains url, escape not required*}
                             <img class="replace-2x" src="{$pro['image']}" alt="{$pro['name']|escape:'htmlall':'UTF-8'}">{*Variable contains url, escape not required*}
                             </a>
                             <div class="content_price" >
{*                                <button type="button" class="btn btn-default btn-sm" >
*}                                    <a href='{$pro['link']}' target="_blank" class="cart-button"><span class="glyphicon glyphicon-shopping-cart"></span> {l s='Add To Cart' mod='facebookstore'}</a>{*Variable contains url, escape not required*}
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
                     <div style="height:50px;overflow: hidden;text-overflow: ellipsis;">
                     <h5><a style="line-height:20px;" class="subcategory-name" href="{$pro['link']}" target="_blank">{$pro['name']|escape:'htmlall':'UTF-8'}</a></h5>{*Variable contains url, escape not required*}
                     </div>
                     <p>{$pro['price']|escape:'htmlall':'UTF-8'}</p>
                     <div class="fbproducts-image">
                        <a href="{$pro['link']}" title="{$pro['name']|escape:'htmlall':'UTF-8'}" target="_blank" class="img">{*Variable contains url, escape not required*}
                        <img class="replace-2x" src="{$pro['image']}" alt="{$pro['name']|escape:'htmlall':'UTF-8'}">{*Variable contains url, escape not required*}
                        </a>
                        <div class="content_price" >
{*                           <button type="button" class="btn btn-default btn-sm" >
*}                               <a href='{$pro['link']}' target="_blank" class="cart-button"><span class="glyphicon glyphicon-shopping-cart"></span> {l s='Add To Cart' mod='facebookstore'}</a>{*Variable contains url, escape not required*}
{*                           </button>
*}                        </div>
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
        {else}
             <p>{l s='No New Products at this time' mod='facebookstore'}</p>
    {/if}
</div>     
    {if $nb_pages > 1}
    <div class="bottom-pagination-content clearfix">
	<div class="product-count" style="width:40%;text-align:left;">{l s='Showing' mod='facebookstore'} {$start|escape:'htmlall':'UTF-8'} - {$end|escape:'htmlall':'UTF-8' } {l s='of' mod='facebookstore'} {$total_pages|escape:'htmlall':'UTF-8'} {l s='items' mod='facebookstore'}</div>					
        <!-- Pagination -->
            <ul class="pagination">
                        {* for left most page *}
                        {if $nb_pages > 1}
                            {assign var=params value=[
                            'category' => $cat_id,
                            'page' => 1
                            ]}
                            {if $page_no neq 1}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                    $params)}">
                                        <span><<</span>
                                    </a>
                                </li>
                            {else}
                                <li class="active current">
                                    <span><span><<</span></span>
                                </li>
                            {/if}    
                        {/if}    
                        {* for 1 page previous to current page *}
                        {if $nb_pages > 1}
                            {if $page_no-1 > 0}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $page_no-1
                                ]}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                    $params)}">
                                    <span><</span>
                                    </a>
                                <li>
                            {else}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => 1
                                ]}
                                {if $page_no neq 1}
                                    <li>
                                        <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                        $params)}">
                                            <span><</span>
                                        </a>
                                    </li>
                                    {else}
                                    <li class="active current">
                                        <span><span><</span></span>
                                    </li>
                                {/if}
                            {/if}    
                        {/if}    
                        {* if at last page then also show last-2 page *} 
                        {if $nb_pages > 1}
                            {if $page_no-2 >= 1 && $page_no eq $nb_pages}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $page_no-2
                                ]}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                        $params)}">
                                        <span>{$page_no-2|escape:'htmlall':'UTF-8'}</span>
                                    </a>
                                </li>    
                            {/if}   
                        {/if}
                        {* for middle of pages *}
                {for $count=1 to $nb_pages}
                {assign var=params value=[
                'category' => $cat_id,
                'page' => $count
                ]}
                            {if $count eq $page_no+1 || $count eq $page_no-1 || $page_no eq $count }
                {if $page_no ne $count}
                    <li>
                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                $params)}">
                    <span>{$count|escape:'htmlall':'UTF-8'}</span>
                    </a>
                    </li>
                    {else}
                    <li class="active current">
                    <span><span>{$count|escape:'htmlall':'UTF-8'}</span></span>
                    </li>
                {/if}
                            {/if}
                {/for}
                        {* if  current page is 1 then also show 3rd page if exist *}
                        {if $nb_pages > 1}
                            {if $page_no+2 le $nb_pages && $page_no eq 1}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $page_no+2
                                ]}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                        $params)}">
                                        <span>{$page_no+2|escape:'htmlall':'UTF-8'}</span>
                                    </a>
                                </li>    
                            {/if}   
                        {/if}
                        {* for next page *}
                        {if $nb_pages > 1}
                            {if $page_no+1 < $nb_pages}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $page_no+1
                                ]}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                    $params)}">
                                        <span>></span>
                                    </a>
                                </li>
                            {else}
                                {assign var=params value=[
                                'category' => $cat_id,
                                'page' => $nb_pages
                                ]}
                                {if $page_no neq $nb_pages}
                                    <li>
                                        <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                            $params)}">
                                            <span>></span>
                                        </a>
                                    </li>
                                {else}
                                    <li class="active current">
                                        <span><span>></span></span>
                                    </li>
                                {/if}
                            {/if}
                            
                            {* for last page i.e >> *}
                        {/if}    
                        {if $nb_pages > 1}
                            {assign var=params value=[
                            'category' => $cat_id,
                            'page' => $nb_pages
                            ]}
                            {if $page_no neq $nb_pages}
                                <li>
                                    <a href="{$link->getModuleLink('facebookstore', 'fbCategory',
                                        $params)}">
                                        <span>>></span>
                                    </a>
                                </li>
                            {else}
                                <li class="active current">
                                    <span><span>>></span></span>
                                </li>
                            {/if}
                        {/if}
            </ul>
	<!-- /Pagination -->
    </div>
    {/if}
   
    </div>
</div>
</div>
    
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