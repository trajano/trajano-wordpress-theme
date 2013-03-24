<?php
namespace trajano;

/**
 * Enqueue JavaScript function libraries. This does not scan the folder as the JavaScript files need to be loaded in
 * a well defined order.
 */
function enqueue_scripts()
{
  wp_enqueue_script("jquery", get_template_directory_uri() . "/js/jquery-1.9.3.js", array (), "1.9.3");
  wp_enqueue_script("bootstrap", get_template_directory_uri() . "/js/bootstrap.js");
}

add_action("wp_enqueue_scripts", "trajano\\enqueue_scripts");
