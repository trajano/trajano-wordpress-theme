<?php
if (is_paged()) :
  get_template_part('index', get_post_format()); else :
  wp_enqueue_script("twp-enable-masonry", get_template_directory_uri() . "/js/enable-masonry.js",
    array ("jquery-masonry"));
  get_header();
  ?>
  <section class="container">
    <?php if (!have_posts()): ?>
      <div class="alert alert-block alert-error">
        <h4><i class="icon-minus-sign"> </i><?php _e("No posts found"); ?></h4>
        <?php _e("This blog has no posts published."); ?>
      </div>
    <?php else: ?>
      <?php
      the_post();
      get_template_part('content/hero-unit', get_post_format());
      get_template_part('content/loop', get_post_format());
      ?>
    <?php endif?>
  </section>
  <?php get_footer();
endif;
