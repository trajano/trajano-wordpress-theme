<?php
/**
 * Enables the Konami code as a short cut to bring up the login screen.  Only if the user
 * has not logged in.
 */
if (!is_user_logged_in()) {
  wp_enqueue_script("enable-konami", get_template_directory_uri() . "/js/enable-konami.js", array ("jquery"));
}
