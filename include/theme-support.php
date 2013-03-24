<?php
/**
 * This registers the supported theme features.
 */
function twp_add_theme_support()
{
  add_theme_support('infinite-scroll');
}

add_action('after_setup_theme', 'twp_add_theme_support');

