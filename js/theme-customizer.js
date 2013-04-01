"use strict";
jQuery(function ($) {
  var themePath = "/wp-content/themes/trajano-wordpress-theme/";
  var bootstrapCssLink = $("#bootstrap-css")[0];
  var colorboxCssLink = $("#colorbox-css")[0];
  var replacementIndex = bootstrapCssLink.href.indexOf(themePath) + themePath.length;
  var themeUri = bootstrapCssLink.href.substring(0, replacementIndex);

  wp.customize("trajano_bootstrap_css",
    function (value) {
      value.bind(function (to) {
        bootstrapCssLink.href = themeUri + to;
      });
    });
  wp.customize("trajano_colorbox_css",
    function (value) {
      value.bind(function (to) {
        colorboxCssLink.href = themeUri + to;
      });
    });
});
