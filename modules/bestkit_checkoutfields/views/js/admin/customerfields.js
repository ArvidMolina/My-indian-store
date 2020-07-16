(function($){
	$(document).ready(function(){
		$(".multishop_toolbar").hide();
	
		$('input[type="radio"][name="type"]').click(function(){
			for (var field in hidedFields) {
				var elem = $('input[name="'+hidedFields[field]+'"]');
				elem.parents('.form-group:first').hide();//.prev().hide();
			}
	
			var type = $(this).val();
			if (typeof shower[type] == 'object') {
				for (var field in shower[type]) {
					var elem = $('input[name="'+shower[type][field]+'"]');
					elem.parents('.form-group:first').show();//.prev().show();
				}
			}
		});
		
		$('input[type="radio"][name="type"]:checked').click();
	});
})(jQuery);