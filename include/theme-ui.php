<?php
/**
 * Theme UI components.  Any dynamic controls or sections that involve more that replacing a place holder are placed
 * here.  All functions will generate either HTML or CSS classes.
 */

/**
 * Displays the home icon image or a home icon with the site header.
 */
function twp_branding()
{
    $imageUrl = get_header_image();
    if (strlen($imageUrl) == 0) {
        if (get_bloginfo("description")) {
            printf("<i class='icon-home icon-white'> </i> %s <small>%s</small>", get_bloginfo("name"), get_bloginfo("description"));
        } else {
            printf("<i class='icon-home icon-white'> </i> %s", get_bloginfo("name"));
        }
    } else {
        echo sprintf("<img src='%s' alt='' />", $imageUrl);
    }
}

/**
 * Extends post_class method to add logic for handling column sizes based on meta data.
 */
function twp_content_post_class()
{
    if (!twp_is_magazine_layout()) {
        if (is_active_sidebar('sidebar-1')) {
            post_class(array("span9", "traditional-layout"));
        } else {
            post_class(array("span12", "traditional-layout"));
        }
        return;
    }
    $columns = get_post_meta(get_the_ID(), "twp_columns", true);

    if (is_active_sidebar('sidebar-1')) {
        if ($columns && $columns[0] == 2) {
            post_class(array("span6", "magazine-layout"));
        } elseif ($columns && $columns[0] == 3) {
            post_class(array("span9", "magazine-layout"));
        } else {
            post_class(array("span3", "magazine-layout"));
        }
    } else {
        if ($columns && $columns[0] == 2) {
            post_class(array("span8"));
        } elseif ($columns && $columns[0] == 3) {
            post_class(array("span12"));
        } else {
            post_class(array("span4"));
        }
    }
}

/**
 * Display dynamic sidebar.  Modified version of the one that comes in widgets.php
 * to support applying the sprintf parameters on the after_title, after_widget and
 * before_title values.
 *
 * By default it displays the default sidebar or 'sidebar-1'. The 'sidebar-1' is
 * not named by the theme, the actual name is '1', but 'sidebar-' is added to
 * the registered sidebars for the name. If you named your sidebar 'after-post',
 * then the parameter $index will still be 'after-post', but the lookup will be
 * for 'sidebar-after-post'.
 *
 * It is confusing for the $index parameter, but just know that it should just
 * work. When you register the sidebar in the theme, you will use the same name
 * for this function or "Pay no heed to the man behind the curtain." Just accept
 * it as an oddity of WordPress sidebar register and display.
 *
 * @since 2.2.0
 *
 * @param int|string $index Optional, default is 1. Name or ID of dynamic sidebar.
 * @return bool True, if widget sidebar was found and called. False if not found or not called.
 */
function twp_dynamic_sidebar($index = 1)
{
    global $wp_registered_sidebars, $wp_registered_widgets;

    if (is_int($index)) {
        $index = "sidebar-$index";
    } else {
        $index = sanitize_title($index);
        foreach ((array)$wp_registered_sidebars as $key => $value) {
            if (sanitize_title($value['name']) == $index) {
                $index = $key;
                break;
            }
        }
    }

    $sidebars_widgets = wp_get_sidebars_widgets();
    if (empty($sidebars_widgets)) {
        return false;
    }

    if (empty($wp_registered_sidebars[$index]) || !array_key_exists($index, $sidebars_widgets) ||
        !is_array($sidebars_widgets[$index]) || empty($sidebars_widgets[$index])
    ) {
        return false;
    }

    $sidebar = $wp_registered_sidebars[$index];

    $did_one = false;
    foreach ((array)$sidebars_widgets[$index] as $id) {

        if (!isset($wp_registered_widgets[$id])) continue;

        $params = array_merge(
            array(array_merge($sidebar, array('widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name']))),
            (array)$wp_registered_widgets[$id]['params']
        );

        // Substitute HTML id and class attributes into before_widget
        $classname_ = '';
        foreach ((array)$wp_registered_widgets[$id]['classname'] as $cn) {
            if (is_string($cn)) {
                $classname_ .= '_' . $cn;
            } elseif (is_object($cn)) {
                $classname_ .= '_' . get_class($cn);
            }
        }
        $classname_ = ltrim($classname_, '_');
        $params[0]['before_widget'] = sprintf($params[0]['before_widget'], $id, $classname_);
        $params[0]['after_widget'] = sprintf($params[0]['after_widget'], $id, $classname_);
        $params[0]['before_title'] = sprintf($params[0]['before_title'], $id, $classname_);
        $params[0]['after_title'] = sprintf($params[0]['after_title'], $id, $classname_);

        $params = apply_filters('dynamic_sidebar_params', $params);

        $callback = $wp_registered_widgets[$id]['callback'];

        do_action('dynamic_sidebar', $wp_registered_widgets[$id]);

        if (is_callable($callback)) {
            call_user_func_array($callback, $params);
            $did_one = true;
        }
    }

    return $did_one;
}

/**
 * Displays a link to edit the post if the user is authorized to do so.
 * @param string classes to add to the link.
 */
function twp_edit_post_link($class = "")
{
    if (current_user_can("edit_post", the_ID())) {
        echo sprintf("<a href='%s' class='%s'><i class='icon-pencil'> </i> %s</a>", get_edit_post_link(), $class,
            _("Edit"));
    }
}

/**
 * Finds the first "img" and returns a link to the image.  However, if the featured image is set, it will use the
 * featured image instead and return smaller sized images.
 * @return string
 */
function twp_first_image_link()
{
    if (has_post_thumbnail()) {
        $full = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");
        $columns = get_post_meta(get_the_ID(), "twp_columns", true);
        if ($columns && ($columns[0] == 2 || $columns[0] == 3)) {
            $medium = wp_get_attachment_image_src(get_post_thumbnail_id(), "large");
        } else {
            $medium = wp_get_attachment_image_src(get_post_thumbnail_id(), "medium");
        }
        printf('<a href="%s" title="%s"><img src="%s" /></a>', $full[0], esc_attr(the_title_attribute('echo=0')), $medium[0]);
    } else {
        if (!preg_match('/<img\s[^>]*?src=[\'"](.+?)[\'"]/is', get_the_content(), $matches)) {
            return;
        }
        $image_src = $matches[1];
        printf('<a href="%s" title="%s"><img src="%s"></a>', $image_src, esc_attr(the_title_attribute('echo=0')), $image_src);
    }
}

/**
 * Returns true if the current page is in magazine layout.
 * @return bool
 */
function twp_is_magazine_layout()
{
    return (!is_home() || get_theme_mod("trajano_magazine_layout_home")) &&
        (!is_category() || get_theme_mod("trajano_magazine_layout_category")) &&
        (!is_tag() || get_theme_mod("trajano_magazine_layout_tag")) &&
        (!is_search() || get_theme_mod("trajano_magazine_layout_search")) &&
        (!is_author() || get_theme_mod("trajano_magazine_layout_author")) &&
        (!is_year() || get_theme_mod("trajano_magazine_layout_date")) &&
        (!is_month() || get_theme_mod("trajano_magazine_layout_date")) &&
        (!is_day() || get_theme_mod("trajano_magazine_layout_date")) &&
        !is_single();
}

/**
 * Echos the monthly archive link.
 */
function twp_month_link()
{
    printf("<a href=\"%s\">%s</a>",
        get_month_link(get_the_time('Y'), get_the_time('m')),
        get_the_date());
}

/**
 * Returns the CSS classes for mainArea.  If sidebar is present and active it is "span6" else it is "span12".
 */
function twp_posts_classes()
{
    echo is_active_sidebar('sidebar-1') ? "span9" : "span12";
}

/**
 * Displays the sidebar if the position matches.
 * @param string $position position of the sidebar
 */
function twp_sidebar($position)
{
    if (get_theme_mod("trajano_sidebar_location") == $position) {
        get_sidebar("sidebar-1");
    }
}
