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

var img_types = ['jpg', 'jpeg', 'png', 'bmp', 'gif'];
var empty_img = 'modules/registrationfields/views/img/empty.png';
$(document).ready(function() {
    var rf_required_fields = ".rf_input_wrapper input:checkbox, .rf_input_wrapper input:radio, .rf_input_wrapper select";
    var rf_to_find = 'input[type="checkbox"]:checked, input[type="radio"]:checked, select option:selected';
    $(rf_required_fields).on('click', function() {
      var nbr_checkedboxes = $(this).closest('.rf_input_wrapper').find(rf_to_find).length;
      $(this).closest('.rf_input_wrapper').find('.rf_checkboxes').val(nbr_checkedboxes);
    });
});

$(document).on('click','.image_container', function() {
    if ($(this).siblings().hasClass('image_input')) {
      $(this).siblings('.image_input').click();
    } else {
      $(this).siblings('.uploader').find('.image_input').click();
    }
});

$(document).on('change', '.image_input', function(event){
    var ext = (typeof $(this).data('extensions') !== 'undefined' && $(this).data('extensions'))? $(this).data('extensions').toLowerCase().split(',') : '';
    var result = array_intersect(ext, img_types);
    $(this).parent().find('.extension_error').hide();
    if (typeof result !== 'undefined' && result.length) {
        if (this.files && this.files[0] && this.files[0].type) {
            var mime = this.files[0].type.split("/").pop();
            if (jQuery.inArray(mime, ext) >= 0) {
                readURL(this)
            } else {
                $('#preview-' + $(this).data('id')).attr('src', empty_img);
                if ($(this).parent().find('.extension_error').hasClass('extension_error')) {
                  $(this).parent().find('.extension_error').show();
                } else {
                  $(this).parent().parent().find('.extension_error').show();
                }
            }
        }
    }
});

$(document).on('click','#updateFields', function(e) {
    var rf_is_checked = _checkRequiredBoxes();
    if (rf_is_checked.length && $.inArray(false, rf_is_checked) >= 0) {
      e.preventDefault();
      return false;
    }
});

function readURL(input) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#preview-' + $(input).data('id')).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}

function _checkRequiredBoxes() {
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

/**
 * find array intersection
 * @return array
 */
function array_intersect() {
  var i, all, shortest, nShortest, n, len, ret = [], obj={}, nOthers;
  nOthers = arguments.length-1;
  nShortest = arguments[0].length;
  shortest = 0;
  for (i=0; i<=nOthers; i++){
    n = arguments[i].length;
    if (n<nShortest) {
      shortest = i;
      nShortest = n;
    }
  }

  for (i=0; i<=nOthers; i++) {
    n = (i===shortest)?0:(i||shortest); //Read the shortest array first. Read the first array instead of the shortest
    len = arguments[n].length;
    for (var j=0; j<len; j++) {
        var elem = arguments[n][j];
        if(obj[elem] === i-1) {
          if(i === nOthers) {
            ret.push(elem);
            obj[elem]=0;
          } else {
            obj[elem]=i;
          }
        }else if (i===0) {
          obj[elem]=0;
        }
    }
  }
  return ret;
}