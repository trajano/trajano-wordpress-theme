jQuery(function ($) {
    'use strict';
    var content = $('#content');

    function applyMasonry() {
        if ($(document).width() >= 768) {
            content.masonry({
                itemSelector: 'article',
                isAnimated: false,
                columnWidth: function (containerWidth) {
                    return containerWidth / 6;
                }
            });
        } else if ($(document).width() < 768 && content.hasClass("masonry")) {
            content.masonry("destroy");
        }
    }

    applyMasonry();

    $(window).resize(applyMasonry);
    content.imagesLoaded(applyMasonry);

    $(document.body).bind("post-load", function () {
        if (content.hasClass("masonry")) {
            content.masonry("appended", content.find("article:not(.masonry-brick)"), true);
        }
    });

});
