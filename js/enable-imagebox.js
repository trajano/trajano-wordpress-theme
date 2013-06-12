jQuery(function ($) {
    'use strict';

    function applyColorBox() {
        var images = $('.single-post .storycontent a, .single-post .thumbnail a').has('img');
        var images2 = $('.format-image .thumbnail a, .format-image h1 a');

        if (images.length === 0 && images2.length === 0) {
            return;
        }
        if ($(document).width() >= 768) {
            images.colorbox({
                rel: 'gal',
                maxWidth: "100%",
                maxHeight: "100%",
                fixed: true,
                scrolling: false
            });
            images2.colorbox({
                rel: 'gal',
                maxWidth: "100%",
                maxHeight: "100%",
                fixed: true,
                scrolling: false
            });
            return;
        }
        var colorBoxEnabled = $(images[0]).hasClass("cboxElement") || $(images2[0]).hasClass("cboxElement");
        if (colorBoxEnabled && $(document).width() < 768) {
            $.colorbox.close();

            $('.cboxElement')
                .removeData("colorbox")
                .removeClass("cboxElement");
        }
    }

    applyColorBox();
    $(window).resize(applyColorBox);
    $(document.body).bind("post-load", applyColorBox);
});
