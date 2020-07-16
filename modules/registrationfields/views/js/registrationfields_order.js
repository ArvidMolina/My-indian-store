/**
* RegistrationFields
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
*
* @author    FME Modules
* @copyright 2018 fmemodules All right reserved
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* @category  FMM Modules
* @package   RegistrationFields
*/

var form = $('#customer-form, #account-creation_form, #new_account_form');
$(document).ready(function() {
    if (parseFloat(pv) < 1.7 && typeof cc !== 'undefined' && cc == 'identity') {
      form = $('body').find('#registration_fields').closest('form');
      $('body').find('#registration_fields').closest('form').attr('id', 'customer-form'); 
    }

    form.attr('data-registrationfields', 'true');
    if (parseFloat(pv) < 1.7) {
      $('body').find('#new_account_form').attr('data-registrationfields', 'true');
      $('#new_account_form').find('#submitGuestAccount').attr('id', 'submitGuestAccount-registration');
    }

    $(document).ajaxComplete(function( event, xhr, settings ) {
      setTimeout(function() {
        form = $('#customer-form, #account-creation_form, #new_account_form');
        form.find('#submitAccount').attr('id', 'submitAccount-registration');

        if (typeof xhr !== 'undefined' 
          && typeof xhr.responseJSON !== 'undefined'
          && typeof xhr.responseJSON.reference !== 'undefined'
          && xhr.responseJSON.reference == 'ajaxFields'
          && typeof xhr.responseJSON.hasError !== 'undefined') {
          form.attr('data-registrationfields', xhr.responseJSON.hasError);
          if (parseFloat(pv) < 1.7) {
            $('body').find('#new_account_form').attr('data-registrationfields', xhr.responseJSON.hasError);
          }
        } else {
          form.attr('data-registrationfields', 'true');
          if (parseFloat(pv) < 1.7) {
            $('body').find('#new_account_form').attr('data-registrationfields', 'true');
          }
        }

        if ($('.image_container').siblings().hasClass('image_input')) {
          $('.image_container').siblings('.image_input').hide();
        } else {
          $('.image_container').siblings('.uploader').find('.image_input').hide();
        }

        //set datetime field
        $('.fields_datapicker').datepicker({
          dateFormat: 'yy-mm-dd',
        });
      }, 600);
    });
})

$(document).on('submit', '#customer-form, #account-creation_form, #new_account_form', function(e) {
    var rf_is_checked = checkRequiredBoxes();
    if (rf_is_checked.length && $.inArray(false, rf_is_checked) >= 0) {
      e.preventDefault();
      return false;
    } else {
      if (typeof $(this).data('registrationfields') !== 'undefined' &&  strToBool($(this).attr('data-registrationfields')) == true) {
        e.preventDefault();
        var formData = new FormData(this);
        var ajaxData = {
            type : 'post',
            dataType : 'json',
            processData: false,
            contentType: false,
            data : formData,
            url : htmlEncode(action_url),
            success: function(response) {
                $('#registration_fields').find('#field-errors').remove();
                if (typeof response !== 'undefined') {
                  if (response.hasError == true) {
                      $('#registration_fields').append(response.errors);
                  } else {
                      form.attr('data-registrationfields', 'false');
                      if (parseFloat(pv) < 1.7) {
                        $('body').find('#new_account_form').attr('data-registrationfields', 'false');
                      }
                      if (parseFloat(pv) >= 1.7) {
                        form.submit();
                      } else {
                        if (typeof cc !== 'undefined' && cc == 'identity') {
                          $('#customer-form').find('button[name="submitIdentity"]').trigger('click');
                        } else {
                          $('#submitAccount-registration').trigger('click');
                          $('#submitGuestAccount-registration').trigger('click');
                        }
                      }
                  }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              alert(errorThrown);
            }
        };
        $.ajax(ajaxData);
      }
    }
})

function strToBool(str) {
  return (str.toLowerCase() === 'true')? true : false;
}

function htmlEncode(input) {
    return String(input).replace(/&amp;/g, '&');
}

function checkRequiredBoxes() {
  var is_checked = [];
  $('.rf_error_wrapper').remove();
  $('.rf_checkboxes').each(function(e) {
    if ($(this).attr('data-required') == 1 && $(this).val() <= 0) {
      var parentDiv = $(this).closest('.rf_input_wrapper');
      var field_label = parentDiv.find('.rf_input_label').text();
      parentDiv.prepend('<div class="error alert alert-danger rf_error_wrapper">'
        + field_label + is_required_label
        + '</div>');
      is_checked.push(false);
    }
  });
  return is_checked;
}