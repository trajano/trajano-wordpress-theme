<article id="post-<?php the_ID(); ?>" <?php twp_content_post_class(); ?>>
<div class="well"
    <?php if (twp_is_no_linking_controls() && get_post_format() === false): ?>
        onclick="location.href = '<?php the_permalink() ?>';"
    <?php endif; ?>
    >
<?php if (get_theme_mod("trajano_magazine_control_date")): ?>
    <h5>
        <i class="icon-calendar"> </i> <?php echo get_the_date(); ?>
    </h5>
<?php endif ?>