<?php
wp_enqueue_script("twp-enable-imagebox", get_template_directory_uri() . "/js/enable-imagebox.js",
    array("jquery-colorbox"));
get_header();
the_post();

$featured_image_url = "";
$show_featured_image_horizontal = false;
$show_featured_image_embedded = false;
if (has_post_thumbnail()) {
    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");
    $featured_image_url = $featured_image[0];
    if (($featured_image[1] / $featured_image[2]) >= (12 / 4)) {
        $show_featured_image_horizontal = true;
    } else {
        $show_featured_image_embedded = true;
    }
}
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(array("container", "narrowcolumn")); ?>>
    <?php if ($show_featured_image_horizontal): ?>
        <div class="row">
            <div class="thumbnail full-width">
                <a href="<?php echo $featured_image_url ?>"><?php the_post_thumbnail("large"); ?></a>
            </div>
        </div>
    <?php endif ?>
    <div class="row">
        <?php twp_sidebar("left"); ?>
        <article class="<?php twp_posts_classes() ?>">
            <?php if ($show_featured_image_embedded): ?>
                <div class="thumbnail span3 pull-right">
                    <a href="<?php echo $featured_image_url ?>"><?php the_post_thumbnail("large"); ?></a>
                </div>
            <?php endif ?>
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
