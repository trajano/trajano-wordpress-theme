<?php
wp_enqueue_script("twp-enable-masonry", get_template_directory_uri() . "/js/enable-masonry.js",
  array ("jquery-masonry"));
?>
<div class="row">
  <?php twp_sidebar("left"); ?>
  <div class="<?php twp_posts_classes() ?>">
    <div class="row multiple-posts" id="content">
      <?php
      while (have_posts()) {
        the_post();
        get_template_part('content', get_post_format());
      }
      ?>
    </div>
  </div>
  <?php twp_sidebar("right"); ?>
</div>
