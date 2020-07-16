/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    knowband.com <support@knowband.com>
 * @copyright 2017 Knowband
 * @license   see file: LICENSE.txt
 * @category  PrestaShop Module
 */


$(document).ready(function () {

//$(".config-steps").prependTo($('.form-wrapper'));
//Form Validation
    $('.fb_connect_button').click(function () {
        var error = false;
        $(".kb_error_message").remove();

        $('input[name="fb_app_secret"]').removeClass('kb_error_field');
        $('input[name="fb_app_id"]').removeClass('kb_error_field');
        /*Knowband validation start*/
        var facebook_app_id_err = velovalidation.checkMandatory($('input[name="fb_app_id"]'));
        if (facebook_app_id_err != true)
        {
            error = true;
            $('input[name="fb_app_id"]').addClass('kb_error_field');
            $('input[name="fb_app_id"]').after('<span class="kb_error_message">' + facebook_app_id_err + '</span>');
        }
        /*Knowband validation end*/
        if (error) {
            return false;
        } else {
            $('#configuration_form').submit();
        }
    });

    $('#kb_config').click(function () {
        $('#configuration_form').show();
        $('.fb-success').hide();
    });

    $('#kb_add_profile').click(function () {
        window.location.href = add_profile_action + '&addkb_facebook_profiles'
    });

    $('#kb_add_profile1').click(function () {
        window.location.href = add_profile_action + '&addkb_facebook_profiles'
    });


});

