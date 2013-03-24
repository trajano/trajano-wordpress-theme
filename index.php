<?php get_header(); ?>
<?php if (get_theme_mod("trajano_sidebar_location") == "left") {
  get_sidebar();
} ?>
<?php if (get_theme_mod("trajano_sidebar_location") == "right") {
  get_sidebar();
}
?>
<?php get_footer(); ?>
