jQuery(document).ready(function($) {
  
  var updateInterval = 10000 // check for new order (in milliseconds)
  var checkNewOrder = function() {
    $.ajax({
      type: "POST",
      url: orderAlarmUrl,
      dataType: 'json',
      data: {
        'alarm' : 1,
      },
      success: function(response) {
      if(response && response.alarm){
          document.getElementById('alarmAudio').play();
        }
      }
    });
  }

  setInterval(checkNewOrder, updateInterval);
});

