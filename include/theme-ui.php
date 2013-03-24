<?php
/**
 * Theme UI components.  Any dynamic controls or sections that involve more that replacing a place holder are placed
 * here.  All functions will generate either HTML or CSS classes.
 */

/**
 * Displays the home icon image or a home icon.
 */
function twp_home_icon_image()
{
  $imageUrl = get_theme_mod("trajano_home_icon_image");
  if (strlen($imageUrl) == 0) {
    echo "<i class='icon-home icon-white'> </i> ";
  } else {
    echo sprintf("<img src='%s' alt='' />", $imageUrl);
  }
}

/**
 * Returns the CSS classes for mainArea.  If sidebar is present it is "span6" else it is "span12".
 */
function twp_posts_classes()
{
  echo get_theme_mod("trajano_sidebar_location") == "none" ? "span12" : "span6";
}

/**
 * Displays the sidebar if the position matches.
 * @param $position position of the sidebar
 */
function twp_sidebar($position)
{
  if (get_theme_mod("trajano_sidebar_location") == $position) {
    get_sidebar();
  }
}
