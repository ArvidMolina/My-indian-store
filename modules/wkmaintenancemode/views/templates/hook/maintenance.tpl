{*
*
* 2010-2019 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2019 Webkul IN
*  @license   https://store.webkul.com/license.html
*}
{literal}
<style>
.image-zoom {
    text-align: center;
    display:block;
    visibility: hidden;
}
.radio.col-lg-2:hover .image-zoom {
    visibility: visible;
}
.ui-datepicker{
    z-index: 999 !important;
}
</style>
<script>

$(function(){
    $('[data-toggle="tab"]').on('click', function(){
        $('#current_tab').val($(this).attr('href'));
    });
    $('a[href="'+$('#current_tab').val()+'"]').trigger('click');
    $('.image-zoom').on('click', function(e){
        e.preventDefault();
        $('body').css({"overflow": "hidden"}).append('<div id="zoom-container" style="width: 100%; position: fixed; z-index: 99999; overflow: auto; height: 100%;"> <center style="position: relative; top: 100px;"><img src="'+ $(this).attr("href") +'"></center></div><div id="zoom-overlay" style="position: fixed; width: 100%; background: #666; opacity: 0.7; height: 100%; z-index: 9999;"></div>');
    });
    $('body').on('click', '#zoom-container, #zoom-overlay', function(){
        $('#zoom-container').remove();
        $('#zoom-overlay').remove();
        $('body').css({"overflow": "initial"});
    });

    $('[for="timer_on"]').on('click', function(){
        $('.active-timer').removeClass('hide');
    });

    $('[for="timer_off"]').on('click', function(){
        $('.active-timer').addClass('hide');
    });

    if($("#timer_on").prop('checked') == true){
        $('.active-timer').removeClass('hide');
    } else {
        $('.active-timer').addClass('hide');
    }


    $('.datetime-picker').datetimepicker({
        prevText: '',
        nextText: '',
        dateFormat: 'yy-mm-dd',
        ampm: false,
        amNames: ['AM', 'A'],
        pmNames: ['PM', 'P'],
        timeFormat: 'hh:mm:ss tt',
        timeSuffix: '',
        minDate: 0
    });
});
</script>
{/literal}
