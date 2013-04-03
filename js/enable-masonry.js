"use strict";
jQuery(function ($) {
  function applyMasonry() {
    if ($(document).width() >= 768) {
      $('#content').masonry({
        itemSelector: 'article',
        isAnimated: false,
        columnWidth: function (containerWidth) {
          return containerWidth / 6;
        }
      });
    } else if ($('#content').hasClass("masonry") && $(document).width() < 768) {
      $('#content').masonry("destroy");
    }
  }

  applyMasonry();

  $(window).resize(applyMasonry);

  $(document.body).bind("post-load", function (event) {
    if ($('#content').hasClass("masonry")) {
      $('#content').masonry("appended", $('#content').find("article:not(.masonry-brick)"), true);
    }
  });

});
