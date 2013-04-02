<?php get_header(); ?>
<section class="container">
  <?php if (have_posts()) {
    get_template_part('content/loop', get_post_format());
  } else {
    ?>
    <div class="alert alert-block">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4><i class="icon-warning-sign"> </i><?php _e("No results found"); ?></h4>
      <?php _e("May we interest you in some other articles?"); ?>
    </div>
    <?php get_template_part('content/random-loop');
  }?>
</section>
<?php get_footer(); ?>
