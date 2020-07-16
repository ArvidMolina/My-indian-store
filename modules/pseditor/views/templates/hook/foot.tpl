{if $psed_optimize}
	{if $smarty.server.HTTP_USER_AGENT|strstr:"Google"}
	{else}
		<script>
		{$psed_js_foot}
		</script>
	{/if}
{else}
	<script>
	{$psed_js_foot}
	</script>
{/if}
