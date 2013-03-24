<?php
namespace trajano;

/**
 * Theme options. This is loaded by the customize_register function that is invoked by the customize_register action.
 */
class ThemeOptions
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
      "default" => "css/bootstrap.css"
    ));
    $wp_customize->add_control("bootstrap_css", array (
      'label' => __('Bootswatch style'),
      'section' => 'colors',
      'settings' => "trajano_bootstrap_css",
      'type' => 'select',
      'choices' => $this->getBootswatchThemes()
    ));

    $wp_customize->add_setting("trajano_feature_background_image", array (
      "default" => ""
    ));
    $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, 'feature_background_image', array (
      "label" => __("Feature article background"),
      "section" => "colors",
      "settings" => "trajano_feature_background_image"
    )));

    /*
     * Site navigation section
     */
    $wp_customize->add_section('siteNav', array (
      'title' => __('Site navigation'),
      'priority' => 90,
    ));

    $wp_customize->add_setting("trajano_home_icon_image", array (
      "default" => ""
    ));
    $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, 'home_icon_image', array (
      "label" => __("Home icon image"),
      "section" => "siteNav",
      "settings" => "trajano_home_icon_image"
    )));

    $wp_customize->add_setting("trajano_sidebar_location", array (
      "default" => "right"
    ));
    $wp_customize->add_control("sidebar_location", array (
      'label' => __('Sidebar location'),
      'section' => 'siteNav',
      'settings' => "trajano_sidebar_location",
      'type' => 'select',
      'choices' => array (
        "none" => __("No sidebar"),
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

  /**
   * Registers the theme customizer.
   *
   * This function is attached to the "customize_register" action hook.
   */
  public static function customizeRegister($wp_customize)
  {
    $theme_options = new ThemeOptions();
    $theme_options->registerOptions($wp_customize);
  }
}

add_action("customize_register", "trajano\\ThemeOptions::customizeRegister");
