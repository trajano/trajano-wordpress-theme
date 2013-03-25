<article id="post-<?php the_ID(); ?>" <?php post_class(array ("entry", "span2", "well")); ?>>
  <div class="entry-title">
    <a href="<?php the_permalink(); ?>"
       title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
       rel="bookmark"><?php the_title(); ?></a></div>

  <div class="entry-excerpt">
    <?php the_excerpt() ?>
  </div>
</article>
