<?php
/**
 * Enqueue JavaScript function libraries. This does not scan the folder as the JavaScript files need to be loaded in
 * a well defined order.
 */
function twp_enqueue_scripts()
{
    if (get_theme_mod("trajano_use_cdn")) {
        wp_enqueue_script("jquery", "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", array(), "1.9.3");
        wp_enqueue_script("bootstrap", "//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js", array("jquery"));
    } else {
        wp_enqueue_script("jquery", get_template_directory_uri() . "/js/jquery-1.9.3.js", array(), "1.9.3");
        wp_enqueue_script("bootstrap", get_template_directory_uri() . "/bootstrap/bootstrap.js", array("jquery"));
    }
    wp_enqueue_script("jquery-colorbox", get_template_directory_uri() . "/colorbox/jquery.colorbox.js", array("jquery"));
    wp_enqueue_script("jquery-masonry", get_template_directory_uri() . "/js/jquery-masonry.js", array("jquery"));

    wp_enqueue_script("twp-enable-imagebox", get_template_directory_uri() . "/js/enable-imagebox.js", array("jquery-colorbox"));
}

add_action("wp_enqueue_scripts", "twp_enqueue_scripts");
