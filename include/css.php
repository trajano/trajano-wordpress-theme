<?php
/**
 * Gets the CDN URL for the CSS file.
 * @param $path string
 * @return string
 */
function twp_get_css_cdn($path)
{
    if ($path == get_template_directory_uri() . "/bootstrap/bootstrap.css") {
        return "//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css";
    } elseif (strrpos($path, get_template_directory_uri() . "/bootswatch/") === 0) {
        $prefix_length = strlen(get_template_directory_uri() . "/bootswatch/");
        $name = substr($path, $prefix_length, strpos($path, "/", $prefix_length) - $prefix_length);
        return sprintf("//netdna.bootstrapcdn.com/bootswatch/2.3.1/%s/bootstrap.min.css", $name);
    }
    return $path;
}

/**
 * CSS files are queued from the ../css folder and are loaded using wp_enqueue_style.  The css/bootstrap.css
 * file is skipped, as the value from get_theme_mod("trajano_bootstrap_css") is used to to get the CSS file used
 * for Bootstrap.  The Font Awesome and style.css are the last to enqueue.
 *
 * The CSS files are only loaded when the admin pages are not being shown.  Otherwise Bootstrap styles will take
 * over.
 */
if (!is_admin()) {
    wp_enqueue_style("colorbox", get_theme_mod("trajano_colorbox_css"));

    $cssDir = opendir(get_template_directory() . "/css");
    while ($path = readdir($cssDir)) {
        if (twp_ends_with($path, ".css")) {
            wp_enqueue_style($path, get_template_directory_uri() . "/css/" . $path);
        }
    }
    if (get_theme_mod("trajano_use_cdn")) {
        wp_enqueue_style("bootstrap", twp_get_css_cdn(get_theme_mod("trajano_bootstrap_css")));
        wp_enqueue_style("fontawesome", "//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css");
        wp_enqueue_style("bootstrap-responsive", "//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css");
    } else {
        wp_enqueue_style("bootstrap", get_theme_mod("trajano_bootstrap_css"));
        wp_enqueue_style("fontawesome", get_template_directory_uri() . "/fontawesome/css/font-awesome.css");
        wp_enqueue_style("bootstrap-responsive", get_template_directory_uri() . "/bootstrap/bootstrap-responsive.css");
    }
    wp_enqueue_style("trajano", get_template_directory_uri() . "/style.css");
}
