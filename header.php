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
          <span class="icon-align-justify"></span>
        </a>
        <a class="brand" href="<?php bloginfo('url'); ?>"><?php twp_branding(); ?></a>

        <?php
        wp_nav_menu(array (
          'container' => false,
          'menu_class' => 'nav',
          'fallback_cb' => false,
          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'walker' => new TwpWalkerNavMenu(),
          'theme_location' => 'header-menu'));
        ?>

        <div class="nav-collapse pull-right">
          <ul class="nav">
            <li><?php get_search_form() ?></li>
            <li class="visible-desktop"><a href="<?php echo get_bloginfo_rss('rss2_url'); ?>"><i
                    class="icon-rss icon-white"> </i></a></li>
            <?php
            $widgets_page = get_page_by_title("_widgets");
            if ($widgets_page && is_active_sidebar('sidebar-1')):
              ?>
              <li class="hidden-desktop"><a href="<?php echo get_page_link($widgets_page->ID); ?>">Sidebar</a></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
