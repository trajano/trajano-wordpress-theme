<?php get_header(); ?>
<section class="container">
  <div class="alert alert-block alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4><i class="icon-minus-sign"> </i><?php _e("Page not found"); ?></h4>
    <?php _e("The page you had requested was not found, may we interest you in some other articles?"); ?>
  </div>
  <?php get_template_part('content/random-loop'); ?>
</section>
<?php get_footer(); ?>
