"use strict";
jQuery(function ($) {
  $('.storycontent a, a.thumbnail').has('img').colorbox({
    rel: 'gal',
    maxWidth: "100%",
    maxHeight: "100%",
    fixed: true,
    scrolling: false
  });
});
