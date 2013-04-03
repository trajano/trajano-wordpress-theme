<?php
if (is_paged()) :
  get_template_part('index', get_post_format()); else :
  wp_enqueue_script("twp-enable-masonry", get_template_directory_uri() . "/js/enable-masonry.js",
    array ("jquery-masonry"));
  get_header();
  ?>
  <section class="container">
    <?php if (!have_posts()): ?>
      <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><i class="icon-folder-open"> </i><?php single_term_title()?></h4>
        <?php echo category_description()?>
      </div>
      <div class="alert alert-block">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><i class="icon-minus-sign"> </i><?php _e("No results found"); ?></h4>
        <?php _e("May we interest you in some other articles?"); ?>
      </div>
      <?php get_template_part('content/random-loop'); ?>
    <?php else: ?>
      <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><i class="icon-folder-open"> </i><?php single_term_title()?></h4>
        <?php echo category_description()?>
      </div>
      <?php
      get_template_part('content/loop', get_post_format());
      ?>
    <?php endif?>
  </section>
  <?php get_footer();
endif;
