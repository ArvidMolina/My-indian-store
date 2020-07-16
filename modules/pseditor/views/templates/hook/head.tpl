<!-- Ps Editor -->
{if $psed_optimize}
	{if $smarty.server.HTTP_USER_AGENT|strstr:"Google"}
	{else}
		<script>
		{$psed_js_head}
		</script>
	{/if}
{else}
	<script>
	{$psed_js_head}
	</script>
{/if}


<style type="text/css">
	{$psed_css}
</style>
{if $psed_verify}{$psed_verify}{/if}
<!-- /Ps Editor -->