<?php
function enqueue_custom_styles_and_scripts()
{
    // Enqueuez le CSS
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');

    // Enqueuez jQuery
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);

    // Enqueuez le JavaScript
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);

    // Enqueuez le script filter-images
    wp_enqueue_script('filter-images', get_template_directory_uri() . '/assets/js/filter-images.js', array('jquery'), '1.0', true);

    // Définissez l'URL AJAX pour votre JavaScript
    wp_localize_script('filter-images', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');


function wp_enqueue_custom_fonts()
{
    wp_enqueue_style('space-mono', get_template_directory_uri()  . '/inc/fonts/');
    wp_enqueue_style('poppins', get_template_directory_uri()  . '/inc/fonts/');
}
add_action('wp_enqueue_scripts', 'wp_enqueue_custom_fonts');
add_action('acf/include_fields', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_651a8cc6c2ebf',
        'title' => 'photo',
        'fields' => array(
            array(
                'key' => 'field_651a8cd00d12a',
                'label' => 'Titre',
                'name' => 'titre',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'titre',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_651a8d06eea44',
                'label' => 'image',
                'name' => 'image',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_651a8da2ce384',
                'label' => 'Catégories',
                'name' => 'categories',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'Réception' => 'Réception',
                    'Concert' => 'Concert',
                    'Mariage' => 'Mariage',
                    'Télévision' => 'Télévision',
                ),
                'default_value' => array(
                    0 => 'categories',
                ),
                'return_format' => 'label',
                'multiple' => 1,
                'allow_null' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_651a8de90168a',
                'label' => 'Références',
                'name' => 'reference',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'bf2385' => 'bf2385',
                    'bf2386' => 'bf2386',
                    'bf2387' => 'bf2387',
                    'bf2388' => 'bf2388',
                    'bf2389' => 'bf2389',
                    'bf2390' => 'bf2390',
                    'bf2391' => 'bf2391',
                    'bf2392' => 'bf2392',
                    'bf2393' => 'bf2393',
                    'bf2394' => 'bf2394',
                    'bf2395' => 'bf2395',
                    'bf2396' => 'bf2396',
                    'bf2397' => 'bf2397',
                    'bf2398' => 'bf2398',
                    'bf2399' => 'bf2399',
                    'bf2400' => 'bf2400',
                ),
                'default_value' => array(
                    0 => 'Références',
                ),
                'return_format' => 'label',
                'multiple' => 1,
                'allow_null' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_651a8e130c8fd',
                'label' => 'Années',
                'name' => 'annees',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    2019 => '2019',
                    2020 => '2020',
                    2021 => '2021',
                    2022 => '2022',
                ),
                'default_value' => array(
                    0 => 'Année',
                ),
                'return_format' => 'label',
                'multiple' => 1,
                'allow_null' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_651a8e396d3e8',
                'label' => 'Format',
                'name' => 'format',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'paysage' => 'paysage',
                    'portrait' => 'portrait',
                ),
                'default_value' => array(
                    0 => 'format',
                ),
                'return_format' => 'label',
                'multiple' => 1,
                'allow_null' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_651a8e7a6a86e',
                'label' => 'type',
                'name' => 'type',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'type',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'photo',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
});


