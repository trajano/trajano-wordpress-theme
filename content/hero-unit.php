<div class="row">
    <div class="span12">
        <div id="post-<?php the_ID(); ?>" <?php post_class(array("hero-unit")); ?>>
            <?php if (has_post_thumbnail()): ?>
                <div class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("medium"); ?></a>
                </div>
            <?php endif ?>

            <h1><a href="<?php the_permalink(); ?>"
                   title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
                   rel="bookmark"><?php the_title(); ?></a></h1>

            <p class="meta text-info">
                <small>
                    <?php if (is_multi_author()): ?>
                        <i class="icon-user"> </i> <?php the_author_posts_link(); ?>
                    <?php endif ?>
                    <i class="icon-calendar"> </i> <?php twp_month_link(); ?>
                    <i class="icon-folder-open"> </i> <?php echo _("Category: ");
                    the_category(_(", ")) ?>
                    <?php if (has_tag()): ?>
                        <i class="icon-tags"> </i> <?php the_tags(_("Tags: "), _(", ")) ?>
                    <?php endif ?>
                    <i class="icon-comments visible-phone"> </i> <?php
                    comments_popup_link(_("No comments"), _("One comment"), _("% comments"), "visible-phone",
                        _("Comments disabled"));
                    ?>
                </small>
            </p>
            <?php the_excerpt() ?>

            <div class="btn-group"><a href="<?php the_permalink(); ?>" class="btn btn-primary btn-large">
                    <i class="icon-eye-open"> </i><?php _e("Read more") ?>
                </a>
                <?php
                twp_edit_post_link("btn btn-large");
                comments_popup_link(_("No comments"), _("One comment"), _("% comments"), "btn btn-large hidden-phone",
                    _("Comments disabled"));
                ?>
            </div>
        </div>
    </div>
</div>
