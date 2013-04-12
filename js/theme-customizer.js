jQuery(function ($) {
    'use strict';

    wp.customize('trajano_bootstrap_css',
        function (value) {
            value.bind(function (to) {
                $('#bootstrap-css')[0].href = to;
            });
        });
    wp.customize('trajano_colorbox_css',
        function (value) {
            value.bind(function (to) {
                $('#colorbox-css')[0].href = to;
                $.colorbox.close();
            });
        });
});
