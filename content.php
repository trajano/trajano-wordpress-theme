<?php if (twp_is_magazine_layout()) : ?>
    <article id="post-<?php the_ID(); ?>" <?php twp_content_post_class(); ?>>
        <div class="well">
            <h5>
                <i class="icon-calendar"> </i> <?php echo get_the_date(); ?>
            </h5>
            <?php if (has_post_thumbnail()): ?>
                <div class="thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("medium") ?></a>
                </div>
            <?php endif ?>

            <h1><a href="<?php the_permalink(); ?>"
                   title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
                   rel="bookmark"><?php the_title(); ?></a></h1>

            <?php the_excerpt() ?>

            <p class="text-info">
                <small>
                    <?php if (is_multi_author()): ?>
                        <i class="icon-user"> </i> <?php the_author_posts_link(); ?>
                    <?php endif ?>
                    <i class="icon-folder-open"> </i> <?php the_category(_(", ")) ?>
                    <?php if (has_tag()): ?>
                        <i class="icon-tags"> </i><?php the_tags("", _(", ")) ?>
                    <?php endif ?>
                    <span class="nowrap"><i class="icon-comments"> </i><?php comments_popup_link(_("No comments"),
                            _("One comment"),
                            _("% comments"), "",
                            _("Comments disabled")) ?></span>
                </small>
            </p>

            <?php if (current_user_can("edit_post", get_the_ID())) : ?>
                <div class="btn-group">
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-small"><i
                            class="icon-eye-open"> </i><?php _e("Read more"); ?></a>
                    <?php twp_edit_post_link("btn btn-small"); ?>
                </div>
            <?php else : ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-small btn-block"><i
                        class="icon-eye-open"> </i> <?php _e("Read more"); ?></a>
            <?php endif ?>

        </div>
    </article>
<?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php twp_content_post_class(); ?>>
        <div class="well">
            <?php if (has_post_thumbnail()): ?>
                <div class="thumbnail pull-right"><a
                        href="<?php the_permalink(); ?>"><?php the_post_thumbnail("thumb"); ?></a></div>
            <?php endif ?>

            <h1><a href="<?php the_permalink(); ?>"
                   title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
                   rel="bookmark"><?php the_title(); ?></a></h1>

            <?php the_excerpt() ?>

            <p class="text-info">
                <small>
                    <?php if (is_multi_author()): ?>
                        <i class="icon-user"> </i> <?php the_author_posts_link(); ?>
                    <?php endif ?>
                    <i class="icon-calendar"> </i> <?php twp_month_link(); ?>
                    <i class="icon-folder-open"> </i> <?php the_category(_(", ")) ?>
                    <?php if (has_tag()): ?>
                        <i class="icon-tags"> </i><?php the_tags("", _(", ")) ?>
                    <?php endif ?>
                    <span class="nowrap"><i class="icon-comments"> </i><?php comments_popup_link(_("No comments"),
                            _("One comment"),
                            _("% comments"), "",
                            _("Comments disabled")) ?></span>
                </small>
            </p>

            <?php if (current_user_can("edit_post", get_the_ID())) : ?>
                <div class="btn-group">
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-small"><i
                            class="icon-eye-open"> </i><?php _e("Read more"); ?></a>
                    <?php twp_edit_post_link("btn btn-small"); ?>
                </div>
            <?php else : ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-small"><i
                        class="icon-eye-open"> </i> <?php _e("Read more"); ?></a>
            <?php endif ?>
            <div class="clearfix"></div>
        </div>
    </article>
<?php endif ?>
