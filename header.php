<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11"/>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
  <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <div class="navbar navbar-inverse navbar-header navbar-static-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="<?php bloginfo('url'); ?>"><?php twp_home_icon_image(); bloginfo('name'); ?></a>

        <div class="nav-collapse pull-right">
          <ul class="nav">
            <li>
              <form class="navbar-search" action="?php bloginfo('url'); ?>">
                <div class="input-append">
                  <input type="text" name="s" placeholder="<?php _e('Search'); ?>">
                  <span class="btn"><i class="icon-search"> </i></span>
                </div>
              </form>
            </li>
            <li class="."><a href="<?php echo get_bloginfo_rss('rss2_url'); ?>"><i class="icon-rss icon-white"> </i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
