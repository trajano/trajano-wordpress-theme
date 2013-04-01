"use strict";
jQuery(function ($) {

  var images = $('.storycontent a, a.thumbnail').has('img');

  function applyColorbox() {
    if (images.length == 0) {
      return;
    }
    $.colorbox.resize();
    var colorboxEnabled = $(images[0]).hasClass("cboxElement");
    console.warn(colorboxEnabled);
    if (!colorboxEnabled && $(document).width() >= 768) {
      images.colorbox({
        rel: 'gal',
        maxWidth: "100%",
        maxHeight: "100%",
        fixed: true,
        scrolling: false
      });
    } else if (colorboxEnabled && $(document).width() < 768) {
      if ($.colorbox.element()) {
        $(document).on("cbox_closed", function () {
          $.colorbox.remove();
        });
        $.colorbox.close();
      } else {
        $.colorbox.remove();
      }
    }
  }

  applyColorbox();
  $(window).resize(applyColorbox);


});
