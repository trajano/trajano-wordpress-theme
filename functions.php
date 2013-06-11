<?php
/**
 * This file is responsible for setting up the programming environment of the theme.  It is responsible for loading up
 * PHP modules in the include folder and define utility functions.
 *
 * PHP function libraries are imported from the include folder and are loaded using require_once.
 */

/**
 * Checks if the string ends with another string.
 * @param $haystack
 * @param $needle
 * @return boolean
 */
function twp_ends_with($haystack, $needle)
{
  return strrpos($haystack, $needle) == (strlen($haystack) - strlen($needle));
}

$includeDir = opendir(get_template_directory()  . "/include");
while ($path = readdir($includeDir)) {
  if (twp_ends_with($path, ".php")) {
    locate_template("/include/" . $path, true, true);
  }
}
