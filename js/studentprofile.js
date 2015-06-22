$("#edit_profile_info").hide();

$("#edit_profile_button").click(function(){
  $("#profile_info").slideUp(1000);
  $("#edit_profile_info").slideDown(1000);
});

$("#cancel_profile_button").click(function(){
  $("#profile_info").slideDown(1000);
  $("#edit_profile_info").slideUp(1000);
})