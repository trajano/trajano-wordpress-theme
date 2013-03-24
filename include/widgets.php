<?php
/**
 * Defines widget area.
 */
function twp_widgets_init()
{
  register_sidebar(array (
    'name' => __('Main Sidebar'),
    'id' => "sidebar-1",
    'description' => __("Appears on all posts and pages unless side bar is disabled."),
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>'
  ));
}

add_action('widgets_init', 'twp_widgets_init');
