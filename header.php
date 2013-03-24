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
