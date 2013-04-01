<?php
if (is_paged()) :
  get_template_part('index', get_post_format()); else :
  wp_enqueue_script("twp-enable-masonry", get_template_directory_uri() . "/js/enable-masonry.js",
    array ("jquery-masonry"));
  get_header();
  ?>
  <section class="container">
    <?php
    the_post();
    get_template_part('content/hero-unit', get_post_format());
    get_template_part('content/loop', get_post_format());
    ?>
  </section>
  <?php get_footer();
endif;
