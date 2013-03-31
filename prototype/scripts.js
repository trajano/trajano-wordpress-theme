"use strict";
jQuery(function ($) {

  $("section.container .btn").click(function (event) {

    for (var i = 0; i < 10; ++i) {
      var post = Math.floor(Math.random() * 6) + 1;
      var span = 3 * (Math.floor(Math.random() * 3) + 1);

      var clone = $("#post-" + post).clone(true);
      clone.removeClass("span3");
      clone.removeClass("span6");
      clone.removeClass("span9");
      clone.removeClass("masonry-brick");
      clone.addClass("span" + span);

      clone.appendTo($('#content'));
    }

    if ($('#content').hasClass("masonry")) {
      $('#content').masonry("appended", $('#content').find("article:not(.masonry-brick)"), true);
    }
    event.preventDefault();
  });

});
