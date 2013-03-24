<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <link rel="profile" href="http://gmpg.org/xfn/11"/>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
  <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="siteNav" class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php bloginfo('url'); ?>"><?php twp_home_icon_image(); bloginfo('name'); ?></a>

      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li>
            <form class="navbar-search" action="?php bloginfo('url'); ?>">
              <input type="text" name="s" class="search-query" placeholder="<?php _e('Search'); ?>">
            </form>
          </li>
          <li><a href="<?php echo get_bloginfo_rss('rss2_url'); ?>"><i class="icon-rss icon-white"> </i></a></li>
        </ul>
      </div>

    </div>
  </div>
</div>
