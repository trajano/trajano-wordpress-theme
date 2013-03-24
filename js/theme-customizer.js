jQuery(function ($) {
  var themePath = "/wp-content/themes/trajano-wordpress-theme/";
  var bootstrapCssLink = $("#bootstrap-css")[0];
  var replacementIndex = bootstrapCssLink.href.indexOf(themePath) + themePath.length;
  var themeUri = bootstrapCssLink.href.substring(0, replacementIndex);

  wp.customize("trajano_bootstrap_css",
    function (value) {
      value.bind(function (to) {
        bootstrapCssLink.href = themeUri + to;
      });
    });
});
