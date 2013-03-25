jQuery(function ($) {
  $('#content').masonry({
    itemSelector: 'article',
    isAnimated: true,
    isFitWidth: true,
    isResizable: true,
    animationOptions: {
      duration: 750,
      easing: 'linear',
      queue: false
    }
  });

  $(document.body).bind("post-load", function (event) {
    $('#content').masonry("reload");
  })
});
