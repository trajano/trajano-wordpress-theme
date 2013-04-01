<?php
/**
 * Enqueue JavaScript function libraries. This does not scan the folder as the JavaScript files need to be loaded in
 * a well defined order.
 */
function twp_enqueue_scripts()
{
  wp_enqueue_script("jquery", get_template_directory_uri() . "/js/jquery-1.9.3.js", array (), "1.9.3");
  wp_enqueue_script("bootstrap", get_template_directory_uri() . "/js/bootstrap.js", array("jquery"));
  wp_enqueue_script("jquery-colorbox", get_template_directory_uri() . "/colorbox/jquery.colorbox.js", array("jquery"));
  wp_enqueue_script("jquery-masonry", get_template_directory_uri() . "/js/jquery-masonry.js", array("jquery"));
}

add_action("wp_enqueue_scripts", "twp_enqueue_scripts");
