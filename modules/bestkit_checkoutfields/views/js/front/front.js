var checkoutFields = {
	checkout_feild_inputs: '.checkout_feilds_wrapper select, .checkout_field select, .checkout_field input, .checkout_field textarea',
	ps_checkout_areas: '#checkout-personal-information-step, #checkout-addresses-step, #checkout-delivery-step, #checkout-payment-step',
	ps_checkout_buttons: '.continue, .cart-detailed-actions a, [name=confirm-addresses], [name=confirmDeliveryOption], #payment-confirmation button',

    init : function() {
        //$(".checkout_feilds_wrapper select, .checkout_field select, .checkout_field input, .checkout_field textarea").live('change', function() {
        $(document).on( "change", checkoutFields.checkout_feild_inputs, function() {
			if (!$(this).hasClass('checkout_field_step_address')) {
				var is_checkbox = ($(this).attr('type') == 'checkbox');
				if (is_checkbox) {
					var val = $(this).prop('checked') ? 1 : 0;
				} else {
					var val = $(this).val();
				}

				checkoutFields.save($(this).attr('attr-id'), val);
			}
        });

        /*$(".checkout_field select, .checkout_field input").each(function(){
            checkoutFields.save($(this).attr('attr-id'), $(this).val());
        });*/
		
		//$("#order-detail-content, #opc_new_account, #opc_account, #opc_delivery_methods, #opc_payment_methods").live('click', function(){
        $(document).on( "change", checkoutFields.ps_checkout_areas, function() {
			//var step = checkoutFields.getStep($(this).attr('id'));
			return checkoutFields.checkRequiredFields($(this).attr('id'));
		});
		
		//$('a.button.btn.btn-default.standard-checkout, #order [name="processAddress"], #order [name="processCarrier"], #HOOK_PAYMENT .payment_module a').live('click', function(){
        $(document).on( "click", checkoutFields.ps_checkout_buttons, function() {
			if (typeof($(this).attr('name')) != 'undefined') {
				return checkoutFields.checkRequiredFields($(this).attr('name'));
			} else if (typeof($(this).attr('id')) != 'undefined') {
				return checkoutFields.checkRequiredFields($(this).attr('id'));
			} else {
				return checkoutFields.checkRequiredFields('undefined');
			}

			/* else if (typeof($(this).parents('#HOOK_PAYMENT')) != 'undefined') {
				return checkoutFields.checkRequiredFields('opc_payment_methods');
			} else {
				return checkoutFields.checkRequiredFields('order-detail-content');
			} */
		});
		
		checkoutFields.datePickerInit();
    },
	
	datePickerInit : function() {
		$( ".checkout_field_value.datepicker" ).datepicker({
            //minDate: -20,
            //maxDate: "+3M +10D",
			onSelect: function(dateText) {
				checkoutFields.save($(this).attr('attr-id'), dateText);
			}
        });
	},

    save : function(id, value) {
        $.ajax({
            type: 'POST',
            headers: { "cache-control": "no-cache" },
            url: checkout_fields_controller,
            async: true,
            cache: false,
            dataType : "json",
            data: { id: id, value: value, action: "saveValue" },
            success: function(jsonData)	{
				if (typeof(jsonData.error) == 'undefined') {
					if (jsonData.id) {
						$('#checkout_field_' + id).parents('.checkout_field.required:first').find('label, .checkout_field_desc').css('color', 'green');
					} else {
						$('#checkout_field_' + id).parents('.checkout_field.required:first').find('label, .checkout_field_desc').css('color', 'red');
					}

					//1.6.12 [begin]
					$('#checkout_field_' + id).removeClass('validation_error');
					//1.6.12 [end]
				} else {
					//1.6.12 [begin]
					$('#checkout_field_' + id).addClass('validation_error');
					//1.6.12 [end]

					swal(cf_error_title, jsonData.error, "error");
					$('#checkout_field_' + id).parents('.checkout_field.required:first').find('label, .checkout_field_desc').css('color', 'red');
				}
            }
        });
    },
	
	inArray : function (needle, haystack) {
		var length = haystack.length;
		for(var i = 0; i < length; i++) {
			if(haystack[i] == needle) 
				return true;
		}
		
		return false;
	},	
	
	checkRequiredFields : function(id) {
		if (id == 'undefined' && $('body').attr('id') == 'cart') 
			id = 'cart';
		else if (id == 'undefined' && $('body').attr('id') == 'checkout') 
			id = 'checkout';
		
console.log('ID: ' + id);
		var return_false = false;

		if (checkoutFields.inArray(id, ['cart'])) { //order-detail-content
			$('.checkout_field.required').each(function(i, item){
				var is_checkbox = ($(item).find('.checkout_field_value').attr('type') == 'checkbox');
			    if (!$(item).find('.checkout_field_value').val() || (is_checkbox && !$(item).find('.checkout_field_value').prop('checked')) ) {
					//1.6.12 [begin]
					$(item).find('.checkout_field_value').addClass('validation_error');
					//1.6.12 [end]

					$(item).find('label, .checkout_field_desc').css('color', 'red');
					swal(cf_error_title, cf_empty_req_field + '"' + $(item).find('label').text() + '"', "error");
					return_false = true;
			    } else if ($(item).find('.checkout_field_value').hasClass('validation_error')) {
					swal(cf_error_title, cf_empty_req_field + '"' + $(item).find('label').text() + '"', "error");
					return_false = true;
				}
			})
		} /*else if (checkoutFields.inArray(id, ['opc_new_account', 'opc_account'])) {
			$('#HOOK_SHOPPING_CART .checkout_field.required, .opc-main-block:first .checkout_field.required').each(function(i, item){
				var is_checkbox = ($(item).find('.checkout_field_value').attr('type') == 'checkbox');
			    if (!$(item).find('.checkout_field_value').val() || (is_checkbox && !$(item).find('.checkout_field_value').prop('checked')) ) {
					//1.6.12 [begin]
					$(item).find('.checkout_field_value').addClass('validation_error');
					//1.6.12 [end]

					$(item).find('label, .checkout_field_desc').css('color', 'red');
					swal(cf_error_title, cf_empty_req_field + '"' + $(item).find('label').text() + '"', "error");
					return_false = true;
			    } else if ($(item).find('.checkout_field_value').hasClass('validation_error')) {
					swal(cf_error_title, cf_empty_req_field + '"' + $(item).find('label').text() + '"', "error");
					return_false = true;
				}
			})
		}*/ else if (checkoutFields.inArray(id, ['confirmDeliveryOption'])) { //'opc_delivery_methods', 'processCarrier'
			$('#checkout-delivery-step .checkout_field.required').each(function(i, item){
				var is_checkbox = ($(item).find('.checkout_field_value').attr('type') == 'checkbox');
			    if (!$(item).find('.checkout_field_value').val() || (is_checkbox && !$(item).find('.checkout_field_value').prop('checked')) ) {
					//1.6.12 [begin]
					$(item).find('.checkout_field_value').addClass('validation_error');
					//1.6.12 [end]

					$(item).find('label, .checkout_field_desc').css('color', 'red');
					swal(cf_error_title, cf_empty_req_field + '"' + $(item).find('label').text() + '"', "error");
					return_false = true;
			    } else if ($(item).find('.checkout_field_value').hasClass('validation_error')) {
					swal(cf_error_title, cf_empty_req_field + '"' + $(item).find('label').text() + '"', "error");
					return_false = true;
				}
			})
		} else if (checkoutFields.inArray(id, ['checkout'])) { //opc_payment_methods
			$('.checkout_field.required').each(function(i, item){ //all available `required` fields
				var is_checkbox = ($(item).find('.checkout_field_value').attr('type') == 'checkbox');
			    if (!$(item).find('.checkout_field_value').val() || (is_checkbox && !$(item).find('.checkout_field_value').prop('checked')) ) {
					//1.6.12 [begin]
					$(item).find('.checkout_field_value').addClass('validation_error');
					//1.6.12 [end]

					$(item).find('label, .checkout_field_desc').css('color', 'red');
					swal(cf_error_title, cf_empty_req_field + '"' + $(item).find('label').text() + '"', "error");
					return_false = true;
			    } else if ($(item).find('.checkout_field_value').hasClass('validation_error')) {
					swal(cf_error_title, cf_empty_req_field + '"' + $(item).find('label').text() + '"', "error");
					return_false = true;
				}
			})
		}
		
		if (return_false) {
			return false;
		}
		
		return true;
	}
}

//when document is loaded...
$(document).ready(function(){
    checkoutFields.init();
})