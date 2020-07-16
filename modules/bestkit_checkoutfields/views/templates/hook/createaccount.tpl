{include file="./account.tpl"}
<script>
	window.onload = function() {
	(function($){
		$('#customer-form section').after($('.bestkit_customerattributes'));
		$('#customer-form').attr('enctype', 'multipart/form-data');
		$('.bestkit_date').datepicker();
		$('#customer-form').submit(function(){
			var noErrors = true;
			$('#customer-form fieldset .required').each(function(){
				//var id = $(this).parent('label').attr('for');
				var input = $(this).find('input:first, textarea:first, select:first');
				if ((input.attr('type') == 'checkbox' || input.attr('type') == 'radio') && !input.is(':checked')) {
					input.focus();
					noErrors = false;
					return false;		
				}

				var val = $.trim(input.val());
				if (val == '') {
					input.focus();
					noErrors = false;
					return false;
				}
			});
			
			return noErrors;
		});
	})(jQuery);
	};
</script>
<br><br>