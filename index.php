<?php get_header(); ?>
<div id="siteNav" class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php bloginfo('url'); ?>"><?php get_home_icon_image(); bloginfo('name'); ?></a>

      <div class="nav-collapse collapse">
        <form class="navbar-search pull-right" action="?php bloginfo('url'); ?>">
          <input type="text" name="s" class="search-query" placeholder="<?php _e('Search'); ?>">
        </form>
      </div>

    </div>
  </div>
</div>
<?php
function get_home_icon_image()
{
  $imageUrl = get_theme_mod("trajano_home_icon_image");
  if (strlen(get_theme_mod("trajano_home_icon_image")) == 0) {
    echo "<i class='icon-home icon-white'> </i> ";
  } else {
    echo sprintf("<img src='%s' alt='' />", $imageUrl);
  }
}
?>
<?php if (get_theme_mod("trajano_sidebar_location") == "left") {
  get_sidebar();
} ?>
<?php if (get_theme_mod("trajano_sidebar_location") == "right") {
  get_sidebar();
}
?>
<?php get_footer(); ?>
