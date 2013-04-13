<?php
if (!twp_is_no_linking_controls()): ?>
    <p class="text-info">
        <small>
            <?php if (get_theme_mod("magazine_control_author")): ?>
                <?php if (is_multi_author()): ?>
                    <i class="icon-user"> </i> <?php the_author_posts_link(); ?>
                <?php endif ?>
            <?php endif ?>
            <?php if (get_theme_mod("magazine_control_category")): ?>
                <i class="icon-folder-open"> </i> <?php the_category(_(", ")) ?>
            <?php endif ?>
            <?php if (get_theme_mod("magazine_control_tags")): ?>
                <?php if (has_tag()): ?>
                    <i class="icon-tags"> </i><?php the_tags("", _(", ")) ?>
                <?php endif ?>
            <?php endif ?>
            <?php if (get_theme_mod("magazine_control_comments")): ?>
                <span class="nowrap"><i
                        class="icon-comments"> </i><?php comments_popup_link(_("No comments"),
                        _("One comment"),
                        _("% comments"), "",
                        _("Comments disabled")) ?></span>
            <?php endif ?>

        </small>
    </p>

    <?php if (get_theme_mod("magazine_control_buttons")): ?>
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
    <?php endif ?>
<?php endif ?>
</div>
</article>
