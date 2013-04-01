<article id="post-<?php the_ID(); ?>" <?php post_class(array ("span3"));?>>
  <div class="thumbnail">
    <button class="btn btn-small btn-block btn-inverse">
      <i class="icon-calendar"> </i> <?php the_time('F j, Y'); ?>
    </button>
    <?php if (has_post_thumbnail()): ?>
      <a href="<?php the_permalink(); ?>"><?php twp_featured_image(); ?></a>
    <?php endif ?>

    <h1><a href="<?php the_permalink(); ?>"
           title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
           rel="bookmark"><?php the_title(); ?></a></h1>

    <?php the_excerpt() ?>

    <p class="text-info">
      <small><i class="icon-folder-open"> </i> <?php the_category(_(", "))?>
        <?php if (has_tag()): ?>
          <i class="icon-tags"> </i><?php the_tags("", _(", ")) ?>
        <?php endif ?>
        <span class="nowrap"><i class="icon-comments"> </i><?php comments_popup_link(_("No comments"), _("One comment"),
          _("% comments"), "",
          _("Comments disabled")) ?></span></small>
    </p>
    <a href="<?php the_permalink(); ?>" class="btn btn-small btn-block"><i class="icon-eye-open"> </i> Read more</a>
  </div>
</article>
