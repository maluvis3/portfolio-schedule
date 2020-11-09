$(document).ready(function () {

  var winWidth = $(window).width();

  $.ajax({
    url: '/my_schedule/data/pf.json',
    //dataType: 'jsonp',
    success: function (data) {
      var main = Number(data[0].main);
      var db = Number(data[0].db);
      var api = Number(data[0].api);
      var uiux = Number(data[0].uiux);
      var renewal1 = Number(data[0].renewal1);
      var renewal2 = Number(data[0].renewal2);

      var avg = (main * 0.2) + (db * 0.3) + (api * 0.2) + (uiux * 0.1) + (renewal1 * 0.1) + (renewal2 * 0.1);

      $(".totalBar span").html(`<b class="counter">${avg}</b>%`);
      $(".totalBar span").animate({ width: avg + "%" }, 3000);

      $('.counter').counterUp({
        delay: 5,
        time: 2500
      });
    }
  });

});