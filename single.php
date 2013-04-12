<?php
wp_enqueue_script("twp-enable-imagebox", get_template_directory_uri() . "/js/enable-imagebox.js",
    array("jquery-colorbox"));
get_header();
the_post(); ?>
<section id="post-<?php the_ID(); ?>" <?php post_class(array("container", "narrowcolumn")); ?>>
    <?php if (has_post_thumbnail()):
        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), "full")?>
        <div class="row">
            <div class="thumbnail">
                <a href="<?php echo $featured_image[0] ?>"><?php twp_featured_image("full"); ?></a>
            </div>
        </div>
    <?php endif ?>
    <div class="row">
        <?php twp_sidebar("left"); ?>
        <article class="<?php twp_posts_classes() ?>">
            <h1><a href="<?php the_permalink(); ?>"
                   title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
                   rel="bookmark"><?php the_title(); ?></a></h1>

            <?php if (is_multi_author()): ?>
                <p class="meta text-info">
                    <i class="icon-user"> </i> <?php _e("By: ");
                    the_author_posts_link(); ?>
                    <small>
                    </small>
                </p>
            <?php endif ?>

            <p class="meta text-info">
                <small>
                    <i class="icon-calendar"> </i> <?php twp_month_link(); ?>
                </small>
            </p>

            <p class="text-info">
                <small><i class="icon-folder-open"> </i> <?php echo _("Category: ");
                    the_category(_(", ")) ?></small>
            </p>
            <?php if (has_tag()): ?>
                <p class="text-info">
                    <small><i class="icon-tags"> </i> <?php the_tags(_("Tags: "), _(", ")) ?></small>
                </p>
            <?php endif ?>

            <div class="storycontent">
                <?php the_content(); ?>
            </div>
            <?php comments_template('', true); ?>

        </article>
        <?php twp_sidebar("right"); ?>
    </div>
</section>
<?php get_footer(); ?>
