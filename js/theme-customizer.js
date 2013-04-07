jQuery(function ($) {
    'use strict';
    var themePath = '/wp-content/themes/trajano-wordpress-theme/',
        bootstrapCssLink = $('#bootstrap-css')[0],
        colorboxCssLink = $('#colorbox-css')[0],
        replacementIndex = bootstrapCssLink.href.indexOf(themePath) + themePath.length,
        themeUri = bootstrapCssLink.href.substring(0, replacementIndex);

    wp.customize('trajano_bootstrap_css',
        function (value) {
            value.bind(function (to) {
                bootstrapCssLink.href = themeUri + to;
            });
        });
    wp.customize('trajano_colorbox_css',
        function (value) {
            value.bind(function (to) {
                colorboxCssLink.href = themeUri + to;
            });
        });
});
