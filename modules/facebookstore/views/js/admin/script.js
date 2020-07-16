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

    $('.free-disabled').closest('.form-group').addClass('free-disabled').parent().closest('.form-group').addClass('free-disabled');


    $("input[name='footer_content_1']").closest('.form-group').addClass('free-disabled');
    $("input[name='home_page_content_1']").closest('.form-group').addClass('free-disabled');
    $("input[name='profile[fb_page_color]']").closest('.form-group').addClass('free-disabled');
    $("input[name='profile[prestashop_category][]']").closest('.form-group').addClass('free-disabled');
    $("input[name='profile[product_ids][]']").closest('.form-group').addClass('free-disabled');
    $("input[name='profile[max_no_categories]']").closest('.form-group').addClass('free-disabled');

$(".mColorPicker").parent().parent().append($('#vss-reset-color'));

$('#vss-reset-color').click(function(){
    $('#color_0').val('#48649f');
});

$('#kb_config').click(function(){
     window.location.href = config_link ;
});

$('#kb_profiles').click(function(){
     window.location.href = action_profile_general ;
});

$('.fb-coonect-button').click(function(){
 initFBLogin();
});
$("#multiple-select").select2({
   placeholder: select_product_msg,
   formatNoMatches: no_match_found,
   allowClear: true
});

$("#multiple-select-chosen").chosen();

//To remove clear and Remove button when no other image is uploaded
if($('#bannerimage1').length) {
var img1 = $('#bannerimage1').attr('src').split('/');
var img_banner1 = img1[img1.length - 1];
if(img_banner1 != 'banner1.jpg'){
    $("#clear-thumb1").hide();
    $("#remove-thumb1").show();
} else {
    $("#clear-thumb1").hide();
    $("#remove-thumb1").hide();
}
var img1 = $('#vss-thumbnail').attr('src').split('/');
var img_banner1 = img1[img1.length - 1];
if(img_banner1 != 'logo.jpg'){
    $("#clear-thumb").hide();
    $("#remove-thumb").show();
} else {
    $("#clear-thumb").hide();
    $("#remove-thumb").hide();
        }
        if (typeof thumb !== 'undefined') {

if(thumb != ''){
        $("#thumbnail-selectbutton").css('position','relative');
        $("#thumbnail-selectbutton").parent().append($('#vss-remove-thumb-image'));
            }
        } else {
        $("#remove-thumb").hide();
    }
        if (typeof banner !== 'undefined') {
            if (banner != '') {
        $("#file1-selectbutton").css('position','relative');
        $("#file1-selectbutton").parent().append($('#vss-remove-thumb-image1'));
            }
        } else {
        $("#remove-thumb1").hide();
    }
}
$('.list-group-item').removeClass('active');
$( ".list-group a:first-child" ).addClass( " active" );
$('#general_form').show();
$('#content_form').hide();
$('#general_form').addClass('col-lg-10 col-md-9');
$('#content_form').addClass('col-lg-10 col-md-9');
//Form Validation
    $('.fb_connect_button').click(function() {
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
        if (error){
           return false;
        } else {
            /*Knowband button validation start*/
            $('.fb_connect_button').attr('disabled','disabled');
            /*Knowband button validation end*/
            $('#configuration_form').submit();
        }
    });

    $('.form_general').click(function() {
        var error = false;
        var general_tab = false;
        $(".kb_error_message").remove();

        $('input[name="profile[name]"]').removeClass('kb_error_field');
        $('input[name="profile[fb_tab_name]"]').removeClass('kb_error_field');

        /*Knowband validation start*/
        var profile_err = velovalidation.checkMandatory($('input[name="profile[name]"]'));
        if (profile_err != true)
        {
            error = true;
            general_tab = true;
            $('input[name="profile[name]"]').addClass('kb_error_field');
            $('input[name="profile[name]"]').after('<span class="kb_error_message">' + profile_err + '</span>');
        }
        if (error){
            if(general_tab) {
            } else {
            }
           return false;
        } else {
            $.ajax({
                url: action_profile_general + '&ajax=true',
                type: 'post',
                data: $('#general_form').serialize(),
                success: function(msg) {
                    if (msg == 'exists') {
                        $('select[name="profile[fb_page]"]').addClass('kb_error_field');
                        $('select[name="profile[fb_page]"]').after('<span class="kb_error_message">' + page_tab_exists + '</span>');
                    } else {
                        document.getElementById('profile[id_kb_facebook_profiles]').value = msg;
                        document.getElementById('profile[profile_id]').value = msg;
                        //console.log(document.getElementById('profile[profile_id]').val());
                        $('.list-group-item').removeClass('active');
                        $('#link-Content').addClass(' active');
                        $('#general_form').hide();
                        $('#content_form').show();
                        $('.alert-success').show();
                    }
                },
            });


        }
    });
    $('#clear-thumb').hide();
    $('#clear-thumb1').hide();

    $('#menu_item').parent().append($('.menu-item'));
    $('#menu_item').hide();
    $('.size-field').css('width','100');

    $("#thumbnail").change(function() {
        $("#previous_value1").val('0');
        $('.kb_error_message_thumbnail').remove();
        $('#thumbnail-name').removeClass('kb_error_field');
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

        if (extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                $("#thumbnail-selectbutton").css('position','relative');
                $("#thumbnail-selectbutton").parent().append($('#vss-clear-thumb-image'));
                $("#clear-thumb").show();
                $("#remove-thumb").hide();
                var image_err = velovalidation.checkImage($('input[name="thumbnail"]'));
                if (image_err != true)
                {
                    $('#thumbnail-name').addClass('kb_error_field');
                    $('input[name="thumbnail"]').parent().append('<span class="kb_error_message_thumbnail">' + image_err + '</span>');
                    $("#thumbnail-selectbutton").css('position','relative');
                    $("#thumbnail-selectbutton").parent().append($('#vss-clear-thumb-image'));
                    $("#clear-thumb").show();
                    $("#remove-thumb").hide();
                } else {
                    var image_holder = $("#vss-thumbnail");

                    image_holder.empty();

                    var reader = new FileReader();
                    reader.onload = function(e) {

                        $('#vss-thumbnail').attr('src', e.target.result);
                        $('#vss-thumbnail').attr('style', '');
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                }
            }
        }
    });

    $("#file1").change(function() {
        $("#previous_value2").val('0');
        $('.kb_error_message_thumbnail1').remove();
        $('#file1-name').removeClass('kb_error_field');
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

        if (extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                $("#file1-selectbutton").css('position','relative');
                $("#file1-selectbutton").parent().append($('#vss-clear-thumb-image1'));
                $("#clear-thumb1").show();
                $("#remove-thumb1").hide();
                var image_err = velovalidation.checkImage($('input[name="file1"]'));
                if (image_err != true)
                {
                    $('#file1-name').addClass('kb_error_field');
                    $('input[name="file1"]').parent().append('<span class="kb_error_message_thumbnail">' + image_err + '</span>');
                    $("#file1-selectbutton").css('position','relative');
                    $("#file1-selectbutton").parent().append($('#vss-clear-thumb-image1'));
                    $("#clear-thumb1").show();
                    $("#remove-thumb1").hide();
                } else {
                    var image_holder = $("#bannerimage1");

                    image_holder.empty();

                    var reader = new FileReader();
                    reader.onload = function(e) {

                        $('#bannerimage1').attr('src', e.target.result);
                        $('#bannerimage1').attr('style', '');
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                }
            }
        }
    });

    $("#clear-thumb").bind('click', function() {
        $('.kb_error_message_thumbnail').remove();
        $('#thumbnail-name').removeClass('kb_error_field');
        if(thumb != ''){
        $('#vss-thumbnail').attr('src', thumb);
        if ($.browser.msie) {
                $('#thumbnail-name').replaceWith($('#thumbnail-name').clone());
        } else {
                $('#thumbnail-name').val('');
        }
        $('#thumbnail').val('');

            var img1 = $('#vss-thumbnail').attr('src').split('/');
            var img_banner1 = img1[img1.length - 1];
            if(img_banner1 != 'logo.jpg'){
                $("#clear-thumb").hide();
                $("#remove-thumb").show();
            } else {
                $("#clear-thumb").hide();
            }
        } else {
            if ($.browser.msie) {
                $('#thumbnail-name').replaceWith($('#thumbnail-name').clone());
            } else {
                    $('#thumbnail-name').val('');
            }
            $('#vss-thumbnail').attr('src', noimage);
            $('#thumbnail').val('');
            $("#clear-thumb").hide();
        }
    });

    $("#clear-thumb1").bind('click', function() {
        $('.kb_error_message_thumbnail1').remove();
        $('#file1-name').removeClass('kb_error_field');
        if(banner != ''){
        $('#bannerimage1').attr('src', banner);
        if ($.browser.msie) {
                $('#file1-name').replaceWith($('#file1-name').clone());
        } else {
                $('#file1-name').val('');
        }
        $('#file1').val('');

            var img1 = $('#bannerimage1').attr('src').split('/');
            var img_banner1 = img1[img1.length - 1];
            if(img_banner1 != 'banner1.jpg'){
                $("#clear-thumb1").hide();
                $("#remove-thumb1").show();
            } else {
                $("#clear-thumb1").hide();
            }
        } else {
            if ($.browser.msie) {
                $('#file1-name').replaceWith($('#file1-name').clone());
            } else {
                    $('#file1-name').val('');
            }
            $('#bannerimage1').attr('src', noimage);
            $('#file1').val('');
            $("#clear-thumb1").hide();
        }
    });
    $("#remove-thumb").bind('click', function() {
        if (confirm(confirmation_text_logo))
        {
             if ($.browser.msie) {
                    $('#thumbnail-name').replaceWith($('#thumbnail-name').clone());
             } else {
                    $('#thumbnail-name').val('');
             }
             $('#thumbnail').val('');
            $('#vss-thumbnail').attr('src', noimagelogo);
            $("#previous_value1").val('1');
            $("#remove-thumb").hide();
        }
        else
        {
            return false;
        }
    });
    $("#remove-thumb1").bind('click', function() {
        if (confirm(confirmation_text_banner))
        {
            $('.kb_error_message_thumbnail1').remove();
            $('input[id="file1-name"]').removeClass('kb_error_field');
             if ($.browser.msie) {
                    $('#file1-name').replaceWith($('#file1-name').clone());
             } else {
                    $('#file1-name').val('');
             }
             $('#file1').val('');
            $("#bannerimage1").attr("src", noimagebanner);
            $("#previous_value2").val('1');
            $("#remove-thumb1").hide();
        }
        else
        {
            return false;
        }
    });
    $('.form_content').click(function(){
        var error = false;
        var content_tab = false;
        $(".kb_error_message").remove();
        /*Knowband image validation start*/
        if($('input[name="thumbnail"]').val() != ''){
            var image_err = velovalidation.checkImage($('input[name="thumbnail"]'));
            if (image_err != true)
            {
                error = true;
                content_tab = true;
                $('#thumbnail-name').addClass('kb_error_field');
                $('input[name="thumbnail"]').parent().append('<span class="kb_error_message_thumbnail">' + image_err + '</span>');
            }
        }
        if($('input[name="file1"]').val() != ''){
            var image_err = velovalidation.checkImage($('input[name="file1"]'));
            if (image_err != true)
            {
                error = true;
                content_tab = true;
                $('#file1-name').addClass('kb_error_field');
                $('input[name="file1"]').parent().append('<span class="kb_error_message_thumbnail1">' + image_err + '</span>');
            }
        }
        var max_no_products_mandatory_err = velovalidation.checkMandatory($('input[name="profile[max_no_products]"]'));
        if (max_no_products_mandatory_err != true)
        {
            error = true;
            content_tab = true;
            $('input[name="profile[max_no_products]"]').addClass('kb_error_field');
            $('input[name="profile[max_no_products]"]').after('<span class="kb_error_message">' + max_no_products_mandatory_err + '</span>');
        }
        else
        {
            var numeric_err = velovalidation.isNumeric($('input[name="profile[max_no_products]"]'));
            if (numeric_err != true)
            {
                error = true;
                content_tab = true;
                $('input[name="profile[max_no_products]"]').addClass('kb_error_field');
                $('input[name="profile[max_no_products]').after('<span class="kb_error_message">' + numeric_err + '</span>');
            }
        }
        /*Knowband validation end*/

        var presta_cat = '';
        $('#prestashop_category').find(":input[type=checkbox]").each(function()
        {
            if ($(this).prop("checked") == true) {
                presta_cat = '1';
            }

        });

        if($('select[name="profile[product_type]"]').val() == '2') {
            var data = $('#multiple-select').select2('data');
            if (data.length == 0) {
               error = true;
               content_tab = true;
               $('#s2id_multiple-select').addClass('kb_error_field');
               $('#s2id_multiple-select').after('<span class="kb_error_message">' + pretsa_pro_error + '</span>');
            }

        }
        var menu_item = '';
        var menu_item = $.map($("#lstBox2 option"), function(a)
        {
            return a.value+':'+a.text;
        }).join(',');
        document.getElementById('menu_item').value = menu_item;

        var selectedOpts = $('#lstBox2 option');
        if (selectedOpts.length == 0) {
                error = true;
                content_tab = true;
                $('#lstBox2').addClass('kb_error_field');
                $('#lstBox2').after('<span class="kb_error_message">' + pretsa_menu_error + '</span>');
        }
        if (error){
            return false;
        } else {
             $('#content_form').submit();
            $('.alert-success').show();
        }
    });

 $('#kb_add_profile').click(function(){
     window.location.href = action_profile_general;
    });

    $('#btnRight').click(function (e) {
        var selectedOpts = $('#lstBox1 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $('#btnAllRight').click(function (e) {
        var selectedOpts = $('#lstBox1 option');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $('#btnLeft').click(function (e) {
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $('#btnAllLeft').click(function (e) {
        var selectedOpts = $('#lstBox2 option');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });

});

function initiateFBLogout() {
    if (FB.getAccessToken() != null) {
            FB.logout(function(response) {
                // user is now logged out from facebook do your post request or just redirect
                window.location.replace(href);
            });
    }
}

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return decodeURI(results[1]) || 0;
    }
}

function initFBLogin() {

    FB.login(function(response) {
        if (response.status === 'connected') {
            var accessToken = response.authResponse.accessToken;
            var accessUser = response.authResponse.userID
            if($.urlParam('id_kb_facebook_profiles') !== null){
                var id = $.urlParam('id_kb_facebook_profiles');
                var url_req = action_profile_general + '&connectfb_edit=' + id +'&ajax=true';
            } else {
                var url_req = action_profile_general + '&connectfb=1&ajax=true'
            }
            $.ajax({
                url: url_req,
                type: 'post',
                data: 'access_token='+accessToken+'&user='+accessUser,
                success: function(msg) {
                    if(msg=='success'){
                     location.href += '&fbcn=1';
                    }else {
                       alert("Please try with other account. You are not authorised to access this page");
                    }
                },
            });
        } else if (response.status === 'not_authorized') {
        } else {
        }
    }, {scope: 'email, manage_pages, pages_manage_cta, pages_show_list'});
}

window.fbAsyncInit = function() {
    FB.init({
      appId: fb_app_id,
      cookie: true,
      version: 'v2.9'
  });
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
/*
 * Change profile form tabs
 */
function change_tabs(a, b) {
    if(b==2){
        var save = document.getElementById('profile[id_kb_facebook_profiles]').value;
        if(save == ''){
            alert("Save General Settings to proceed.");
            return false;
        }
    }
    $('.list-group-item').removeClass('active');
    $(a).addClass(' active');
    if (b == 1) {
        $('#general_form').show();
        $('#content_form').hide();
    } else if (b == 2) {
        $('#general_form').hide();
        $('#content_form').show();
    }
}

