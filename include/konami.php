<?php
/**
 * Enables the Konami code as a short cut to bring up the login screen.  Only if the user
 * has not logged in.
 */
function twp_enqueue_konami()
{
    if (!is_user_logged_in()) {
        wp_enqueue_script("enable-konami", get_template_directory_uri() . "/js/enable-konami.js", array("jquery"));
    }
}

add_action("wp_enqueue_scripts", "twp_enqueue_konami");
