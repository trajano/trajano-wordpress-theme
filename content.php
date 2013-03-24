<?php
the_post_thumbnail(); ?>
<h1 class="entry-title">
  <a href="<?php the_permalink(); ?>"
     title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
     rel="bookmark"><?php the_title(); ?></a></h1>
<div>
  <?php the_content() ?>
</div>
