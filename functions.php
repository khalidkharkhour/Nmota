<?php function enqueue_custom_styles_and_scripts() {
    // Enqueue CSS
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');

    // Enqueue JavaScript
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');
