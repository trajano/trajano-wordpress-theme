<?php
/**
 * Theme UI components.  Any dynamic controls or sections that involve more that replacing a place holder are placed
 * here.  All functions will generate either HTML or CSS classes.
 */

/**
 * Extends post_class method to add logic for handling column sizes based on meta data.
 */
function twp_content_post_class()
{
  if ((is_home() && !get_theme_mod("trajano_magazine_layout_home")) ||
      (is_category() && !get_theme_mod("trajano_magazine_layout_category")) ||
      (is_tag() && !get_theme_mod("trajano_magazine_layout_tag")) ||
      (is_search() && !get_theme_mod("trajano_magazine_layout_search")) ||
      (is_author() && !get_theme_mod("trajano_magazine_layout_author")) ||
      (is_year() && !get_theme_mod("trajano_magazine_layout_date")) ||
      (is_month() && !get_theme_mod("trajano_magazine_layout_date")) ||
      (is_day() && !get_theme_mod("trajano_magazine_layout_date"))
  ) {
    if (is_active_sidebar('sidebar-1')) {
      post_class(array ("span9"));
    } else {
      post_class(array ("span12"));
    }
    return;
  }
  $columns = get_post_meta(get_the_ID(), "twp_columns", true);

  if (is_active_sidebar('sidebar-1')) {

    if ($columns && $columns[0] == 2) {
      post_class(array ("span6"));
    } elseif ($columns && $columns[0] == 3) {
      post_class(array ("span9"));
    } else {
      post_class(array ("span3"));
    }

  } else {

    if ($columns && $columns[0] == 2) {
      post_class(array ("span8"));
    } elseif ($columns && $columns[0] == 3) {
      post_class(array ("span12"));
    } else {
      post_class(array ("span4"));
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
      array (array_merge($sidebar, array ('widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name']))),
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
 * Displays the featured image as a background.
 */
function twp_featured_image($size = "large")
{
  $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $size);
  $alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
  if (!count($alt)) {
    $alt = "";
  }
  echo sprintf("<img style=\"background-image: url('%s')\" title=\"%s\" />", $featured_image[0], htmlspecialchars($alt));
}

/**
 * Displays the home icon image or a home icon.
 */
function twp_home_icon_image()
{
  $imageUrl = get_header_image();
  if (strlen($imageUrl) == 0) {
    echo "<i class='icon-home icon-white'> </i> ";
  } else {
    echo sprintf("<img src='%s' alt='' />", $imageUrl);
  }
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
