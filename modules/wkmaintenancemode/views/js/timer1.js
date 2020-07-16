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

    // Update the count down every 1 second
    var x = setInterval(function() {
        distance -= 1000;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // If the count down is finished, write some text
      if (distance <= 0) {
          if($('#countdowntimer').data('timelapse_display') == 0){
              $('#countdowntimer').remove();
          }
        clearInterval(x);
        $('#countdowntimer #days').text('00');
        $('#countdowntimer #hours').text('00');
        $('#countdowntimer #minutes').text('00');
        $('#countdowntimer #seconds').text('00');

    } else {
        $('#countdowntimer #days').text(String(days).padStart(2,0));
        $('#countdowntimer #hours').text(String(hours).padStart(2,0));
        $('#countdowntimer #minutes').text(String(minutes).padStart(2,0));
        $('#countdowntimer #seconds').text(String(seconds).padStart(2,0));
    }
    }, 1000);
});
