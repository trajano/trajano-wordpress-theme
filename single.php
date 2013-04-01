<?php get_header(); the_post(); ?>
<section id="post-<?php the_ID(); ?>" <?php post_class(array ("container", "narrowcolumn"));?>>
  <?php if (has_post_thumbnail()): ?>
    <div class="row">
      <a class="thumbnail" href="<?php the_permalink(); ?>">
        <?php twp_featured_image(); ?>
      </a>
    </div>
  <?php endif ?>
  <div class="row">
    <?php twp_sidebar("left"); ?>
    <article class="<?php twp_posts_classes() ?>">
      <h1><a href="<?php the_permalink(); ?>"
             title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
             rel="bookmark"><?php the_title(); ?></a></h1>

      <p class="meta text-info">
        <small>
          <i class="icon-calendar"> </i> <?php the_date(); ?>
        </small>
      </p>

      <p class="text-info">
        <small><i class="icon-folder-open"> </i> <?php echo _("Category: "); the_category(_(", "))?></small>
      </p>
      <?php if (has_tag()): ?>
        <p class="text-info">
          <small><i class="icon-tags"> </i> <?php the_tags(_("Tags: "), _(", "))?></small>
        </p>
      <?php endif ?>

      <?php the_content(); ?>

      <?php comments_template('', true); ?>

    </article>
    <?php twp_sidebar("right"); ?>
  </div>
</section>
<?php get_footer(); ?>
