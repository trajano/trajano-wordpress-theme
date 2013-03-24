<?php
namespace trajano;

/**
 * JavaScript function libraries are queued from the ../js folder and are loaded using the enqueue_scripts function
 * via the wp_enqueue_scripts action.  However, JQuery and Bootstrap are loaded first so they are skipped from the
 * directory scan.
 */
function enqueue_scripts()
{
  wp_enqueue_script("jquery", get_template_directory_uri() . "/js/jquery-1.9.3.js", array (), "1.9.3");
  wp_enqueue_script("bootstrap", get_template_directory_uri() . "/js/bootstrap.js");
  $jsDir = opendir(get_template_directory() . "/js");
  while ($path = readdir($jsDir)) {
    if ($path == "bootstrap.js" || $path == "jquery-1.9.1.js") {
      continue;
    }
    if (ends_with($path, ".js")) {
      wp_enqueue_script($path, get_template_directory_uri() . "/js/" . $path);
    }
  }
}

add_action("wp_enqueue_scripts", "trajano\\enqueue_scripts");
