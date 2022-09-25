$(window).on('load', function(){

  $( ".footer_ctrl" ).on('click', function(){
    fetch_currecny_rates();
  });

  function fetch_currecny_rates() {
    // get the most recent exchange rates via the "latest" endpoint:
    var displayRates = '';
    $.ajax({
        url: '/currencyexchangerates/getexchangerates',
        dataType: 'json',
        success: function(response) {
          var currencyDetails = response.rates;
          if(currencyDetails) {
            $.each( currencyDetails, function( key, value ) {
              console.log(key+value);
              displayRates += "<div class='box'><span class='currency'>"+key+"</span><span class='c_value'>"+value+"</span></div>"
            });
          }
          $( ".exchange_rates" ).html(displayRates);
          var dt = new Date();
          var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
          $( ".cur_time" ).html(time);

        },
        error: function(json) {
          alert("errorrrrrrrrrr");
        }
    });
  };
  fetch_currecny_rates();
});