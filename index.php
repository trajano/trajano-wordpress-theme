<?php get_header(); ?>
<div class="container">
  <div class="row">
    <?php twp_sidebar("left"); ?>
    <div id="mainArea" class="<?php twp_posts_classes() ?>">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          the_content();
        }
      }
      ?>
    </div>
    <?php twp_sidebar("right"); ?>
  </div>
</div>
<?php get_footer(); ?>
