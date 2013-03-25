<?php
wp_enqueue_script("twp-enable-masonry", get_template_directory_uri() . "/js/enable-masonry.js", array("jquery-masonry"));
get_header();
?>
<div class="container">
  <div class="row">
    <?php twp_sidebar("left"); ?>
    <div id="mainArea" class="<?php twp_posts_classes() ?>">
      <?php if (have_posts()) : ?>
        <div id="content">
          <?php
          while (have_posts()) {
            the_post();
            get_template_part('content', get_post_format());
          }
          ?>
        </div>
      <?php endif      ?>
    </div>
    <?php twp_sidebar("right"); ?>
  </div>
</div>
<?php get_footer(); ?>
