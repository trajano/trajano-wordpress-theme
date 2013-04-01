<?php get_header(); ?>
<section class="container">
  <?php get_template_part('content/loop', get_post_format()); ?>
</section>
<?php get_footer(); ?>
