<?php
/**
 * This registers the supported theme features.
 */
function twp_add_theme_support()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-background');
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width' => 20,
        'height' => 20,
        'flex-width' => true,
        'flex-height' => true,
        'random-default' => true,
        'header-text' => false,
        'default-text-color' => '',
        'uploads' => true,
    ));
    add_theme_support('infinite-scroll', array(
        'footer' => false
    ));
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('image'));
}

add_action('after_setup_theme', 'twp_add_theme_support');

