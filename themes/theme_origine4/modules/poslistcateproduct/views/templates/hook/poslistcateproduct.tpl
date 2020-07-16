{$count=0}
{foreach from=$productCates item=productCate name=poslistcateproduct}
	<div class="poslistcateproduct poslistcateproduct_{$count} product_container"
		data-items="{$slider_options.number_item}" 
		data-speed="{$slider_options.speed_slide}"
		data-autoplay="{$slider_options.auto_play}"
		data-time="{$slider_options.auto_time}"
		data-arrow="{$slider_options.show_arrow}"
		data-pagination="{$slider_options.show_pagination}"
		data-move="{$slider_options.move}"
		data-pausehover="{$slider_options.pausehover}"
		data-md="{$slider_options.items_md}"
		data-sm="{$slider_options.items_sm}"
		data-xs="{$slider_options.items_xs}"
		data-xxs="{$slider_options.items_xxs}">
		<div class="container"> 
		<div class="category_iner">
		<div class="pos_title">
				<h2>
					{$productCate.category_name}
				
				</h2>
			
			
				{if $productCate.list_subcategories}
					<ul class="subcategories-list">
						{foreach from=$productCate.list_subcategories item=subcategories}
						<li><a href="{$link->getCategoryLink($subcategories['id_category'])}" target="_blank">{$subcategories.name}</a></li>
						{/foreach}
					</ul>
				
				{/if}
		</div>
			
		<div class="pos-content">		
				
				<div class="row">
					<div class="cate_center ">
						{$j=0}
						{foreach from=$productCate.product item=product name=myLoop}
							<article class="js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
										<div class="img_block">
											{block name='product_thumbnail'}
												<a href="{$product.url}" class="thumbnail product-thumbnail">
												  <img
													src = "{$product.cover.bySize.home_default.url}"
													alt = "{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
													data-full-size-image-url = "{$product.cover.large.url}"
												  >
												  {hook h="rotatorImg" product=$product}	
												</a>
											  {/block}
											{block name='product_flags'}
												<ul class="product-flag">
													{if $product.show_price}
													   {if $product.has_discount}
														   {if $product.discount_type === 'percentage'}
															  <li class="discount-percentage">{$product.discount_percentage}</li>
															{/if}
														{/if}
													{/if}
													{foreach from=$product.flags item=flag}
														<li class=" {$flag.type}">{$flag.label}</li>
													{/foreach}
												</ul>
											 {/block}
											<ul class="link">
												<li class="wishlist">
													{hook h='displayProductListFunctionalButtons' product=$product}
												</li>
												<li class="quick_view">
													<a href="#" class="quick-view" data-link-action="quickview" title="{l s='Quick view' d='Shop.Theme.Actions'}">{l s='Quick view' d='Shop.Theme.Actions'}</a>
												</li>
											
											</ul>	
										</div>
										<div class="product_desc">
											<div class="desc_info">
												{block name='product_price_and_shipping'}
												  {if $product.show_price}
													<div class="product-price-and-shipping">
													   <span itemprop="price" class="price {if $product.has_discount} price_sale {/if}">{$product.price}</span>
													  {if $product.has_discount}
														{hook h='displayProductPriceBlock' product=$product type="old_price"}

														<span class="sr-only">{l s='Regular price' d='Shop.Theme.Catalog'}</span>
														<span class="regular-price">{$product.regular_price}</span>
														{if $product.discount_type === 'percentage'}
														  <span class="discount-percentage">{$product.discount_percentage}</span>
														{/if}
													  {/if}

													  {hook h='displayProductPriceBlock' product=$product type="before_price"}

													  <span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
												  

													  {hook h='displayProductPriceBlock' product=$product type='unit_price'}

													  {hook h='displayProductPriceBlock' product=$product type='weight'}
													</div>
												  {/if}
												{/block}
												{block name='product_name'}
													<h4><a href="{$product.url}" title="{$product.name}" itemprop="name" class="product_name">{$product.name|truncate:30:'...'}</a></h4>
												{/block}
												{block name='product_reviews'}
													<div class="hook-reviews">
														{hook h='displayProductListReviews' product=$product}
													</div>
												{/block}
												<div class="hover">
													<div class="add-to-links">
														{include file='catalog/_partials/customize/button-cart.tpl' product=$product}
													</div>	
												</div>	
												{block name='product_description_short'}
													<div class="product-desc" itemprop="description">{$product.description_short nofilter}</div>
												{/block}
												{block name='product_variants'}
													{if $product.main_variants}
													  {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
													{/if}
												{/block}
											</div>	
											
										</div>
									</article>								
						{$j = $j+1}  
						{if $j == 1}{break}{/if}
						{/foreach}
					</div>
					<div class="col-right">
						<div class="listcateSlide owl-carousel">	
							{$j=0}
							{foreach from=$productCate.product item=product name=myLoop}
								{if $j > 1}							
								{if $smarty.foreach.myLoop.index % $slider_options.rows == 0 || $smarty.foreach.myLoop.first }
								<div class="item-product">
								{/if}
									{include file="catalog/_partials/miniatures/product.tpl" product=$product}
								{if $smarty.foreach.myLoop.iteration %  $slider_options.rows == 0 || $smarty.foreach.myLoop.last}
									</div>
								{/if}
								
							{/if}
							{$j = $j+1}  
							{if $j == 20}{break}{/if}
							{/foreach}	
							
						</div>
					
					</div>
				</div>
			
		</div>
		</div>				
		</div>				
	</div>
	{$count= $count+1}
{/foreach}
