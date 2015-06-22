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

// password and confirm_password validation
  var password = document.getElementById("password");
  var confirm_password = document.getElementById("confirm_password");
  function validatePassword() {
    if (password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords do not match");
    }
    else {
      confirm_password.setCustomValidity("");
    }
  }
  document.getElementById('submit_button').onclick = validatePassword;

});