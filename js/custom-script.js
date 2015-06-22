$(document).ready(function(){
  $(".dropdown-button").dropdown({hover: false});
  $('.dropdown-content').click(function(e) {
    if(!(this.getAttribute("data-closeonclick")=="true")){
      e.stopPropagation();
    }
  });


  $(".button-collapse").sideNav();

  $('.parallax').parallax();
  $('select').material_select();
  $('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 130,
    startDate:'1 January 1950',
  });

  $('.bxslider').bxSlider({
    minSlides: 6,
    maxSlides: 6,
    slideWidth: 220,
    slideMargin: 20,
    ticker: true,
    speed: 1000 * 20,
    caption: true
  });

});