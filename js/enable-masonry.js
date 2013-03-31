"use strict";
var masonrySettings = {
  itemSelector: 'article',
  isAnimated: true,
  columnWidth: function (containerWidth) {
    return containerWidth / 6;
  }
};

jQuery(function ($) {

  function applyMasonry() {
    if ($(document).width() >= 768) {
      $('#content').masonry(masonrySettings);
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
