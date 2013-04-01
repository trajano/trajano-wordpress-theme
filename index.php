<?php
wp_enqueue_script("twp-enable-masonry", get_template_directory_uri() . "/js/enable-masonry.js",
  array ("jquery-masonry"));
get_header();
?>
<section class="container">
  <div class="row">
    <?php twp_sidebar("left"); ?>
    <div class="<?php twp_posts_classes() ?>">
      <?php if (have_posts()) : ?>
        <div class="row widecolumn" id="content">
          <?php
          while (have_posts()) {
            the_post();
            get_template_part('content', get_post_format());
          }
          ?>
        </div>
      <?php endif ?>
    </div>
    <?php twp_sidebar("right"); ?>
  </div>
</section>
<?php get_footer(); ?>
