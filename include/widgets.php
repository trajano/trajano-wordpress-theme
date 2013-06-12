<?php
/**
 * Defines widget area.
 */
function twp_widgets_init()
{
    register_sidebar(array(
        'name' => __('Main Sidebar'),
        'id' => "sidebar-1",
        'description' => __("Appears on all posts and pages unless side bar is disabled."),
        'before_title' => '',
        'after_title' => '</a></div><div id="%1$s" class="accordion-body collapse in"><div class="accordion-inner">',
        'before_widget' => '<div class="accordion-group %2$s"><div class="accordion-heading"><a href="#%1$s" data-parent="#accordions" data-toggle="collapse" class="accordion-toggle">',
        'after_widget' => '</div></div></div>'
    ));
}

add_action('widgets_init', 'twp_widgets_init');
