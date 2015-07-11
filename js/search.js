/* To check if device is a Mobile */
if (screen.width <= 1000) {
  var isMobile = true;
} else {
  var isMobile = false;
}

/* Search Page - Filter Panel */
var sticker = $("#sticker_panel");
var pos_stk = sticker.position();

$(window).scroll(function() {
  if (!isMobile) {
    var windowpos = $(window).scrollTop() + 60;
    var stickermax = $(document).outerHeight() - $("#footer").outerHeight() - sticker.outerHeight() - 60;
    if (windowpos >= pos_stk.top && windowpos < stickermax) {
      sticker.attr("style", ""); // kill absolute positioning
      sticker.addClass("stick"); // stick it
    } else if (windowpos >= stickermax) {
      sticker.removeClass();     // un-stick
      sticker.css({position: "absolute", top: stickermax + "px"}); //set sticker right above the footer
    } else {
      sticker.removeClass(); //top of page
    }
  }
});

ms.refinecallafter();
