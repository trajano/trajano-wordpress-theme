<?php
/**
 * Theme options. This is loaded by the customize_register function that is invoked by the customize_register action.
 */
class TwpThemeOptions
{

  /**
   * Registers the options.
   */
  public function registerOptions($wp_customize)
  {
    /*
     * Colors section
     */
    $wp_customize->add_setting("trajano_bootstrap_css", array (
      "default" => "css/bootstrap.css",
      "transport" => "postMessage"
    ));
    $wp_customize->add_control("bootstrap_css", array (
      'label' => __('Bootswatch style'),
      'section' => 'colors',
      'settings' => "trajano_bootstrap_css",
      'type' => 'select',
      'choices' => $this->getBootswatchThemes()
    ));

    $wp_customize->add_setting("trajano_colorbox_css", array (
      "default" => "colorbox/example1/colorbox.css",
      "transport" => "postMessage"
    ));
    $wp_customize->add_control("colorbox_css", array (
      'label' => __('Colorbox style'),
      'section' => 'colors',
      'settings' => "trajano_colorbox_css",
      'type' => 'select',
      'choices' => $this->getColorboxThemes()
    ));

    /*
     * Site navigation section
     */
    $wp_customize->add_section('siteNav', array (
      'title' => __('Site navigation'),
      'priority' => 90,
    ));

    $wp_customize->add_setting("trajano_sidebar_location", array (
      "default" => "right"
    ));
    $wp_customize->add_control("sidebar_location", array (
      'label' => __('Sidebar location'),
      'section' => 'siteNav',
      'settings' => "trajano_sidebar_location",
      'type' => 'select',
      'choices' => array (
        "left" => __("Sidebar on the left"),
        "right" => __("Sidebar on the right")
      )
    ));
  }

  /**
   * Bootswatch themes.  This is read from the bootswatch folder and adds the default Bootstrap theme to the list
   * explicitly as it is not in the bootswatch folder and it should be the first value.
   * @return array
   */
  private function getBootswatchThemes()
  {
    $bootswatchThemes = array ();
    $bootswatchThemes["css/bootstrap.css"] = __("Default Bootstrap");
    $bootswatchDir = opendir(get_template_directory() . "/bootswatch");
    while ($path = readdir($bootswatchDir)) {
      if ($path == "LICENSE" || $path == "." || $path == ".." || $path == "default" || $path == "img") {
        continue;
      }
      $cssFile = "bootswatch/" . $path . "/bootstrap.css";
      if (!file_exists(get_template_directory() . "/" . $cssFile)) {
        continue;
      }
      $bootswatchThemes[$cssFile] = $path;
    }
    return $bootswatchThemes;
  }

  private function getColorboxThemes()
  {
    $themes = array ();
    $dir = opendir(get_template_directory() . "/colorbox");
    while ($path = readdir($dir)) {
      if ($path == "LICENSE" || $path == "." || $path == ".." || $path == "default" || $path == "img") {
        continue;
      }
      $cssFile = "colorbox/" . $path . "/colorbox.css";
      if (!file_exists(get_template_directory() . "/" . $cssFile)) {
        continue;
      }
      $themes[$cssFile] = $path;
    }
    return $themes;
  }
}

/**
 * Registers the theme customizer.  This will register the enqueueThemeCustomizerScript function to the
 * "customize_preview_init" action.
 *
 * This function is attached to the "customize_register" action hook.
 */
function twp_customize_register($wp_customize)
{
  $theme_options = new TwpThemeOptions();
  $theme_options->registerOptions($wp_customize);
  add_action("customize_preview_init", "twp_enqueue_theme_customizer_script");
}

/**
 * Enqueue the theme-customizer.js file.
 */
function twp_enqueue_theme_customizer_script()
{
  wp_enqueue_script("theme-customizer", get_template_directory_uri() . "/js/theme-customizer.js", array ("jquery"));
}

add_action("customize_register", "twp_customize_register");
