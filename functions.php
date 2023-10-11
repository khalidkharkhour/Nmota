<?php
/**
 * Fonctions et paramètres du thème
 *
 * @package Nathalie-mota
 */
function enqueue_custom_styles_and_scripts()
{
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_style('lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
    wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), '', true);


    // wp_enqueue_style('fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css');
    //wp_enqueue_script('fancybox-js', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);
    // wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/slider.js', array('jquery'), '1.0', true);
    // Enqueuez le CSS personnalisé
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
    wp_enqueue_script('custom-slider-script', get_template_directory_uri() . '/assets/js/slider.js', array('jquery'), '1.0', true);
    // Enqueuez le JavaScript commun à toutes les pages
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);

    wp_enqueue_script('your-custom-script', get_template_directory_uri() . '/assets/js/filter-images.js', array('jquery'), null, true);
    wp_localize_script('your-custom-script', 'custom_script_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));


    if (is_single()) {

        wp_enqueue_script('single-script', get_template_directory_uri() . '/assets/js/single.js', array('jquery'), '1.0', true);
    }
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

function load_gallery_images_callback()
{
    if (isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'load-more-action')) {
    } elseif (isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'return-button-action')) {
    } else {
        $images = array();


        $args = array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'post_parent' => $post_id,
            'post_mime_type' => 'image'
        );

        $attachments = get_posts($args);

        foreach ($attachments as $attachment) {
            $image_url = get_field('image');

            $image_url = wp_get_attachment_image_url($attachment->ID, 'full');
            if ($image_url) {
                $images[] = $image_url;
            }
        }


        echo json_encode(array('success' => true, 'images' => $images));
    }
    wp_die();
}
add_action('wp_ajax_load_gallery_images', 'load_gallery_images_callback');
add_action('wp_ajax_nopriv_load_gallery_images', 'load_gallery_images_callback');

function is_mobile()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $mobile_agents = array(
        'iPhone',          // Apple iPhone
        'iPad',            // Apple iPad
        'Android',         // 1.5+ Android
        'webOS',           // Palm Pre Experimental
        'BlackBerry',      // BlackBerry 9000
        'iPod',            // Apple iPod touch
        'Mobile',          // Generic Mobile
        'Opera Mini',      // Opera Mini
        'IEMobile',        // Internet Explorer Mobile
        'Windows Phone',   // Microsoft Windows Phone
    );


    foreach ($mobile_agents as $agent) {
        if (stripos($user_agent, $agent) !== false) {
            return true;
        }
    }

    return false;
}
function theme_customizer_settings($wp_customize)
{

    $wp_customize->add_section('logo_section', array(
        'title' => __('Logo', 'Nathalie-mota'),
        'priority' => 30,
    ));


    $wp_customize->add_setting('logo_setting', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_setting', array(
        'label' => __('Sélectionner le logo', 'Nathalie-mota'),
        'section' => 'logo_section',
        'settings' => 'logo_setting',
    )));
}
add_action('customize_register', 'theme_customizer_settings');
function redirigerVers404()
{
    header("HTTP/1.0 404 Not Found");
    include("404.php");
    exit();
}


$request_uri = $_SERVER['REQUEST_URI'];
if ($request_uri !== '/' and $request_uri ==='/wp-admin') {
    redirigerVers404();
}

$args = array(
    'post_type' => 'photo',
    'posts_per_page' => -1,
);

$photo_posts = get_posts($args);


$photo_slugs = array();

foreach ($photo_posts as $photo_post) {
    $photo_slugs[] = $photo_post->post_name;
}


$url_parts = parse_url($request_uri);

if (isset($url_parts['query'])) {
    parse_str($url_parts['query'], $query_params);


    if (isset($query_params['photo'])) {
        $slug = $query_params['photo'];

        if (!in_array($slug, $photo_slugs)) {
            redirigerVers404();
        }
    }
}
