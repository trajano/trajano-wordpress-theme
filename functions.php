<?php
namespace trajano;

/**
 * This file is responsible for setting up the programming environment of the theme.  It is responsible for loading up
 * PHP modules in the include folder and define utility functions.  It initializes the PHP error reporting to be strict
 * to reduce the chances of developer error.
 *
 * PHP function libraries are imported from the include folder and are loaded using require_once.
 */
error_reporting(E_ALL);

/**
 * Checks if the string ends with another string.
 * @param $haystack
 * @param $needle
 * @return boolean
 */
function ends_with($haystack, $needle)
{
  return strrpos($haystack, $needle) == (strlen($haystack) - strlen($needle));
}

$includeDir = opendir(get_template_directory()  . "/include");
while ($path = readdir($includeDir)) {
  if (ends_with($path, ".php")) {
    require_once(dirname(__FILE__) . "/include/" . $path);
  }
}
