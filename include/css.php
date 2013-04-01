<?php
/**
 * CSS files are queued from the ../css folder and are loaded using wp_enqueue_style.  The css/bootstrap.css
 * file is skipped, as the value from get_theme_mod("trajano_bootstrap_css") is used to to get the CSS file used
 * for Bootstrap.  The Font Awesome and style.css are the last to enqueue.
 *
 * The CSS files are only loaded when the admin pages are not being shown.  Otherwise Bootstrap styles will take
 * over.
 */
if (!is_admin()) {
  wp_enqueue_style("bootstrap", get_template_directory_uri() . "/" . get_theme_mod("trajano_bootstrap_css"));

  $cssDir = opendir(get_template_directory() . "/css");
  while ($path = readdir($cssDir)) {
    if ($path != "bootstrap.css" && twp_ends_with($path, ".css")) {
      wp_enqueue_style($path, get_template_directory_uri() . "/css/" . $path);
    }
  }

  wp_enqueue_style("fontawesome", get_template_directory_uri() . "/fontawesome/css/font-awesome.css");
  wp_enqueue_style("trajano", get_template_directory_uri() . "/style.css");
}
