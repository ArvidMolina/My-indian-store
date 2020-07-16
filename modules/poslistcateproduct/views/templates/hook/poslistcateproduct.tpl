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
		<div class="pos_title">
				<div class="row">
					<div class=" col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 col">
						<h2>
							<span>{$productCate.category_name}</span>
						
						</h2>
					</div>
					<div class=" col-xs-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 col">
						{if $productCate.list_subcategories}
						<ul class="subcategories-list">
							{foreach from=$productCate.list_subcategories item=subcategories}
							<li><a href="{$link->getCategoryLink($subcategories['id_category'])}" target="_blank">{$subcategories.name}</a></li>
							{/foreach}
						</ul>
						
						{/if}
				
					</div>
				</div>
		</div>
			<div class="listcateproduct-products">
				<div class="pos-content">		
					<div class="listcateSlide">		
						<div class="row">		
							<div class="cate_center col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-5">
								{$j=0}
								{foreach from=$productCate.product item=product name=myLoop}
									<article class="js-product-miniature item_in" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
										<div class="img_block">
											{block name='product_thumbnail'}
											  <a href="{$product.url}" class="thumbnail product-thumbnail">
												<img
												  src = "{$product.cover.bySize.large_default.url}"
												  alt = "{$product.cover.legend}"
												  data-full-size-image-url = "{$product.cover.large.url}"
												>
											  </a>
											{/block}	
											<ul class="link">
												<li class="quick_view">
													<a href="#" class="quick-view" data-link-action="quickview" title="{l s='Quick view' d='Shop.Theme.Actions'}">{l s='Quick view' d='Shop.Theme.Actions'}</a>
												</li>
												
											</ul>												
										</div>
										<div class="product_desc">
										   
										  {block name='product_name'}
											<h4><a href="{$product.url}" title="{$product.name}" itemprop="name" class="product_name">{$product.name}</a></h4>
										  {/block}
										  {block name='product_price_and_shipping'}
											{if $product.show_price}
											  <div class="product-price-and-shipping">
												{if $product.has_discount}
												  {hook h='displayProductPriceBlock' product=$product type="old_price"}

												  <span class="regular-price">{$product.regular_price}</span>
												  {if $product.discount_type === 'percentage'}
													<span class="discount-percentage">{$product.discount_percentage}</span>
												  {/if}
												{/if}

												{hook h='displayProductPriceBlock' product=$product type="before_price"}

												<span itemprop="price" class="price">{$product.price}</span>

												{hook h='displayProductPriceBlock' product=$product type='unit_price'}

												{hook h='displayProductPriceBlock' product=$product type='weight'}
											  </div>
											{/if}
										  {/block}
										   
										  {block name='product_description_short'}
												<div class="product-desc" itemprop="description">{$product.description_short|truncate:80:' ...'|escape:'html':'UTF-8' nofilter}</div>
											{/block}
											<div class="cart">
												{include file='catalog/_partials/customize/button-cart.tpl' product=$product}
											</div>
										</div>
									</article>								
								{$j = $j+1}  
								{if $j == 1}{break}{/if}
								{/foreach}
							</div>
							<div class="col-right col-xs-12 col-sm-12 col-md-4 col-lg-6 col-xl-7">
								<div class="row">
								<div class="cate_right owl-carousel pos_content ">
									{$j=0}
									{foreach from=$productCate.product item=product name=myLoop}
									{if $j > 0}							
										{if ($smarty.foreach.myLoop.index + 1) % 2 == 0 }
											<div class="item-product">
										{/if}
											{include file="catalog/_partials/miniatures/product.tpl" product=$product}
										{if ($smarty.foreach.myLoop.iteration + 1) %  2 == 0 || $smarty.foreach.myLoop.last}
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
	</div>
	{$count= $count+1}
{/foreach}
