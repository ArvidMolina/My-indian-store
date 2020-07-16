/**
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
*/
$(function(){
    // Set the date we're counting down to
    var sdatetime = new Date($('#countdowntimer').data('sdatetime')).getTime();
    var edatetime = new Date($('#countdowntimer').data('edatetime')).getTime();
    var cdatetime = new Date($('#countdowntimer').data('cdatetime')).getTime();

    // Find the distance between cdatetime and the count down date
    var distance = edatetime - cdatetime;

    var tdays = Math.floor(distance / (1000 * 60 * 60 * 24));

    // Update the count down every 1 second
    var x = setInterval(function() {
        distance -= 1000;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      updateCounter('#days', days, tdays);
      updateCounter('#hours', hours, 24);
      updateCounter('#minutes', minutes, 60);
      updateCounter('#seconds', seconds, 60);

      // If the count down is finished, write some text
      if (distance < 1000) {
          if($('#countdowntimer').data('timelapse_display') == 0){
              $('#countdowntimer').remove();
          }
        clearInterval(x);
      }

    }, 1000);
});

function updateCounter($id, $v, $l)
{
    if($v <= 0){
        $v = 0;
    }
    $l++;
    $($id).find('.counter').text(String($v).padStart(2,0));
    $v = $l - $v;
    var percent = Number(($v * 100) / $l).toFixed(2);
    var deg = Number(360 * percent / 100).toFixed(2);
    var cir = 101 - percent;
    if($v == 0 || deg > 360 || deg < 1)
    {
        deg = 0;
    }
    if($v == 0 || cir > 100 || cir < 1)
    {
        cir = 0;
    }

    deg = Math.round(deg);
    cir = Math.round(cir);

    $($id).find('.countdown__progress').css({'stroke-dashoffset':cir});
    $($id).find('.countdown-progress-label-container').css({'transform' : 'rotateZ('+deg+'deg)'});

}
