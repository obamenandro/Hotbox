$(document).ready(function () {
  'use strict';

  $('ul li').on('click', function(){
    var tab_data = $(this).data('tab');
    $(this).addClass('active').siblings().removeClass('active');

    $(tab_data).show().siblings().hide();
  })
});


function keypresshandler(event)
{
     var charCode = event.keyCode;
     //Non-numeric character range
     if (charCode > 31 && (charCode < 48 || charCode > 57))
     return false;
}
