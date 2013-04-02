<?php
if (is_paged()) :
  get_template_part('index', get_post_format()); else :
  wp_enqueue_script("twp-enable-masonry", get_template_directory_uri() . "/js/enable-masonry.js",
    array ("jquery-masonry"));
  get_header();
  ?>
  <section class="container">
    <?php if (!have_posts()): ?>
      <div class="alert alert-block">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><i class="icon-search"> </i><?php _e("No results found for"); ?> <em><?php the_search_query()?></em></h4>
        <?php _e("May we interest you in some other articles?"); ?>
      </div>
      <?php get_template_part('content/random-loop'); ?>
    <?php else: ?>
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><i class="icon-search"> </i><?php _e("Search results for:"); ?> <em><?php the_search_query()?></em>
        </h4>
      </div>
      <?php
      the_post();
      get_template_part('content/hero-unit', get_post_format());
      get_template_part('content/loop', get_post_format());
      ?>
    <?php endif?>
  </section>
  <?php get_footer();
endif;
