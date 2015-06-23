$("#edit_profile_info").hide();

function smgPreloader() {
  var preloader_html = '<div class="preloader-wrapper small active"><div class="spinner-layer spinner-green-only"><div class="circle-clipper ' +
                       'left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper ' + 
                       'center"><div class="circle"></div></div></div></div>';
  $(".smg-preloader").html(preloader_html).show();
  $(".smg").hide();
  setTimeout(function(){$(".smg-preloader").fadeOut(1000);}, 1000);
  setTimeout(function(){$(".smg").fadeIn(1000);}, 2000);
}
