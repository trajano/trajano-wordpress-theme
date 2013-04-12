jQuery(function ($) {
    'use strict';

    var images = $('.storycontent a, .thumbnail a').has('img');

    function applyColorBox() {
        if (images.length === 0) {
            return;
        }
        var colorBoxEnabled = $(images[0]).hasClass("cboxElement");
        if (!colorBoxEnabled && $(document).width() >= 768) {
            images.colorbox({
                rel: 'gal',
                maxWidth: "100%",
                maxHeight: "100%",
                fixed: true,
                scrolling: false
            });
        } else if (colorBoxEnabled && $(document).width() < 768) {
            $.colorbox.close();

            $('.cboxElement')
                .removeData("colorbox")
                .removeClass("cboxElement");
        }
    }

    applyColorBox();
    $(window).resize(applyColorBox);
});
