
	<div class="ft_newsletter">
		<div class="content_newsletter">
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<div class="titile">
					<h3>
						{l s='Join Our' d='Shop.Theme.Global'}
						<span class="iner">{l s='Newsletter Now' d='Shop.Theme.Global'}</span>
					</h3>
					
				</div>	
			</div>	
			<div class="col-xs-12 col-md-4">
				<div class="text_new">{l s='Join 60.000+ subscribers and get a new discount coupon on every Wednesday.' d='Shop.Theme.Global'}</div>
			</div>
			<div class="col-xs-12 col-md-5">
				<div class="block_content">
					<form action="{$urls.pages.index}#footer" method="post">
						<div class="input-wrapper">
						  <input
							name="email"
							class="input_txt"
							type="text"
							value="{$value}"
							placeholder="{l s='Your email address' d='Shop.Forms.Labels'}"
						  >
						</div>
						<button class="btn btn-primary" name="submitNewsletter" type="submit" value="">{l s='Subscribe' d='Shop.Theme.Actions'}</button>
						<input type="hidden" name="action" value="0">
					</form>
					
					<div class="col-xs-12">
					  {if $msg}
						<p class="alert {if $nw_error}alert-danger{else}alert-success{/if}">
						  {$msg}
						</p>
					  {/if}
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
