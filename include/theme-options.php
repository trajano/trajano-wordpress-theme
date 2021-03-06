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
         * Styles section
         */
        $wp_customize->add_section('styles', array(
            'title' => __('Styles'),
            'priority' => 90,
        ));

        $wp_customize->add_setting("trajano_bootstrap_css", array(
            "default" => "css/bootstrap.css",
            "transport" => "postMessage"
        ));
        $wp_customize->add_control("bootstrap_css", array(
            'label' => __('Bootstrap theme'),
            'section' => 'styles',
            'settings' => "trajano_bootstrap_css",
            'type' => 'select',
            'choices' => $this->getBootswatchThemes()
        ));

        $wp_customize->add_setting("trajano_colorbox_css", array(
            "default" => "colorbox/example1/colorbox.css",
            "transport" => "postMessage"
        ));
        $wp_customize->add_control("colorbox_css", array(
            'label' => __('Colorbox style'),
            'section' => 'styles',
            'settings' => "trajano_colorbox_css",
            'type' => 'select',
            'choices' => $this->getColorboxThemes()
        ));

        $wp_customize->add_setting("trajano_use_cdn", array(
            "default" => false
        ));
        $wp_customize->add_control("use_cdn", array(
            'label' => __('Use CDN resources where possible'),
            'section' => 'styles',
            'settings' => "trajano_use_cdn",
            'type' => 'checkbox'
        ));

        /*
         * Layout section
         */
        $wp_customize->add_section('layout', array(
            'title' => __('Layout'),
            'priority' => 91,
        ));

        $wp_customize->add_setting("trajano_magazine_layout_home", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_layout_home", array(
            'label' => __('Magazine layout on home page'),
            'section' => 'layout',
            'settings' => "trajano_magazine_layout_home",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_layout_search", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_layout_search", array(
            'label' => __('Magazine layout on search page'),
            'section' => 'layout',
            'settings' => "trajano_magazine_layout_search",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_layout_category", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_layout_category", array(
            'label' => __('Magazine layout on category page'),
            'section' => 'layout',
            'settings' => "trajano_magazine_layout_category",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_layout_tag", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_layout_tag", array(
            'label' => __('Magazine layout on tag page'),
            'section' => 'layout',
            'settings' => "trajano_magazine_layout_tag",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_layout_author", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_layout_author", array(
            'label' => __('Magazine layout on author page'),
            'section' => 'layout',
            'settings' => "trajano_magazine_layout_author",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_layout_date", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_layout_date", array(
            'label' => __('Magazine layout on dated archive page'),
            'section' => 'layout',
            'settings' => "trajano_magazine_layout_date",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_sidebar_location", array(
            "default" => "right"
        ));
        $wp_customize->add_control("sidebar_location", array(
            'label' => __('Sidebar location'),
            'section' => 'layout',
            'settings' => "trajano_sidebar_location",
            'type' => 'select',
            'choices' => array(
                "left" => __("Sidebar on the left"),
                "right" => __("Sidebar on the right")
            )
        ));

        /*
         * Layout section
         */
        $wp_customize->add_section('magazine_controls', array(
            'title' => __('Magazine controls'),
            'priority' => 92,
        ));

        $wp_customize->add_setting("trajano_magazine_control_date", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_control_date", array(
            'label' => __('Show date'),
            'section' => 'magazine_controls',
            'settings' => "trajano_magazine_control_date",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_control_category", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_control_category", array(
            'label' => __('Show categories'),
            'section' => 'magazine_controls',
            'settings' => "trajano_magazine_control_category",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_control_tags", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_control_tags", array(
            'label' => __('Show tags'),
            'section' => 'magazine_controls',
            'settings' => "trajano_magazine_control_tags",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_control_author", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_control_author", array(
            'label' => __('Show author'),
            'section' => 'magazine_controls',
            'settings' => "trajano_magazine_control_author",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_control_comments", array(
            "default" => true
        ));
        $wp_customize->add_control("magazine_control_comments", array(
            'label' => __('Show comments'),
            'section' => 'magazine_controls',
            'settings' => "trajano_magazine_control_comments",
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting("trajano_magazine_control_buttons", array(
            "default" => true,
        ));
        $wp_customize->add_control("magazine_control_buttons", array(
            'label' => __('Show buttons'),
            'section' => 'magazine_controls',
            'settings' => "trajano_magazine_control_buttons",
            'type' => 'checkbox'
        ));

    }

    /**
     * Bootstrap themes.  This is read from the bootswatch folder and adds the default Bootstrap theme to the list
     * explicitly as it is not in the bootswatch folder and it should be the first value.
     * @return array
     */
    private function getBootswatchThemes()
    {
        $bootswatchThemes = array();
        $bootswatchThemes[get_template_directory_uri() . "/bootstrap/bootstrap.css"] = __("Default Bootstrap");
        $bootswatchDir = opendir(get_template_directory() . "/bootswatch");
        while ($path = readdir($bootswatchDir)) {
            if ($path == "LICENSE" || $path == "." || $path == ".." || $path == "default" || $path == "img") {
                continue;
            }
            $cssFile = "bootswatch/" . $path . "/bootstrap.css";
            if (!file_exists(get_template_directory() . "/" . $cssFile)) {
                continue;
            }
            $bootswatchThemes[get_template_directory_uri() . "/" . $cssFile] = sprintf(__("Bootswatch: %s"), $path);
        }
        $bootswatchDir = opendir(get_template_directory() . "/bootstrap-themes");
        while ($path = readdir($bootswatchDir)) {
            if ($path == "LICENSE" || $path == "." || $path == ".." || $path == "default" || $path == "img") {
                continue;
            }
            $cssFile = "bootstrap-themes/" . $path . "/bootstrap.css";
            if (!file_exists(get_template_directory() . "/" . $cssFile)) {
                continue;
            }
            $bootswatchThemes[get_template_directory_uri() . "/" . $cssFile] = $path;
        }
        return $bootswatchThemes;
    }

    private function getColorboxThemes()
    {
        $themes = array();
        $dir = opendir(get_template_directory() . "/colorbox");
        while ($path = readdir($dir)) {
            if ($path == "LICENSE" || $path == "." || $path == ".." || $path == "default" || $path == "img") {
                continue;
            }
            $cssFile = "colorbox/" . $path . "/colorbox.css";
            if (!file_exists(get_template_directory() . "/" . $cssFile)) {
                continue;
            }
            $themes[get_template_directory_uri() . "/" . $cssFile] = $path;
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
    wp_enqueue_script("theme-customizer", get_template_directory_uri() . "/js/theme-customizer.js", array("jquery"));
}

add_action("customize_register", "twp_customize_register");
