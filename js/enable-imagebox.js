"use strict";
jQuery(function ($) {

  var images = $('.storycontent a, a.thumbnail').has('img');

  function applyColorbox() {
    if (images.length === 0) {
      return;
    }
    var colorboxEnabled = $(images[0]).hasClass("cboxElement");
    if (!colorboxEnabled && $(document).width() >= 768) {
      images.colorbox({
        rel: 'gal',
        maxWidth: "100%",
        maxHeight: "100%",
        fixed: true,
        scrolling: false
      });
    } else if (colorboxEnabled && $(document).width() < 768) {
      $.colorbox.close();

      $('.cboxElement')
        .removeData("colorbox")
        .removeClass("cboxElement");
    }
  }

  applyColorbox();
  $(window).resize(applyColorbox);
});
