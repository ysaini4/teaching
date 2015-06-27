$("#forgot_pass_section").hide();

function forgotPass() {
  var prefix = $("#forgot_prefix_arrow");
  if (prefix.attr("class") == "mdi-hardware-keyboard-arrow-up") {
    prefix.attr("class", "mdi-hardware-keyboard-arrow-down");
  }
  else {
    prefix.attr("class", "mdi-hardware-keyboard-arrow-up");
  }
  $("#login_section").slideToggle(1000);
  $("#forgot_pass_section").slideToggle(1000);
}
