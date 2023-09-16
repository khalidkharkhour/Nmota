<?php
function enqueue_parent_and_child_styles()
{
    // Enqueue parent theme's stylesheet
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    
    // Enqueue child theme's stylesheet
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('parent-style'));
}

add_action('wp_enqueue_scripts', 'enqueue_parent_and_child_styles');
