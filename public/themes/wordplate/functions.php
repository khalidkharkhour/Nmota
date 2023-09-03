<?php
require 'inc/customize.php';

// Register theme defaults.
add_action('after_setup_theme', function () {
    show_admin_bar(false);

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus([
        'navigation' => __('Navigation'),
        
    ]);
});

// Register scripts and styles.
function my_enqueue_scripts() {
    $manifestPath = get_theme_file_path('assets/manifest.json');

    if (
        wp_get_environment_type() === 'local' &&
        is_array(wp_remote_get('http://localhost:5173/')) // is Vite.js running
    ) {
        wp_enqueue_script('vite', 'http://localhost:5173/@vite/client', [], null);
        wp_enqueue_script('wordplate', 'http://localhost:5173/resources/js/index.js', [], null);
    } elseif (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);
    
        $jsFile = isset($manifest['resources/js/index.js']['file']) ? $manifest['resources/js/index.js']['file'] : '';
        $cssFile = isset($manifest['resources/js/index.css']['file']) ? $manifest['resources/js/index.css']['file'] : '';
    
        if (!empty($jsFile)) {
            wp_enqueue_script('wordplate', get_theme_file_uri('assets/' . $jsFile), [], null);
        }
    
        if (!empty($cssFile)) {
            wp_enqueue_style('wordplate', get_theme_file_uri('assets/' . $cssFile), [], null);
        }
    }

    if (is_page_template('single.php')) {
        // Enqueue the generated CSS and JS
        wp_enqueue_script('wordplate', get_theme_file_uri('assets/index.js'), [], null);
        wp_enqueue_style('wordplate', get_theme_file_uri('assets/index.css'), [], null);
    }
}

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');


// Load scripts as modules.
add_filter('script_loader_tag', function (string $tag, string $handle, string $src) {
    if (in_array($handle, ['vite', 'wordplate'])) {
        return '<script type="module" src="' . esc_url($src) . '" defer></script>';
    }

    return $tag;
}, 10, 3);

/* Remove admin menu items.
add_action('admin_init', function () {
    remove_menu_page('edit-comments.php'); // Comments
     remove_menu_page('edit.php?post_type=page'); // Pages
   remove_menu_page('edit.php'); // Posts
    remove_menu_page('index.php'); // Dashboard
    remove_menu_page('upload.php'); // Media
    
});

// Remove admin toolbar menu items.
add_action('admin_bar_menu', function (WP_Admin_Bar $menu) {
    $menu->remove_node('comments'); // Comments
    $menu->remove_node('customize'); // Customize
    $menu->remove_node('dashboard'); // Dashboard
    $menu->remove_node('edit'); // Edit
    $menu->remove_node('menus'); // Menus
    $menu->remove_node('new-content'); // New Content
    $menu->remove_node('search'); // Search
     $menu->remove_node('site-name'); // Site Name
    $menu->remove_node('themes'); // Themes
    $menu->remove_node('updates'); // Updates
    $menu->remove_node('view-site'); // Visit Site
    $menu->remove_node('view'); // View
    $menu->remove_node('widgets'); // Widgets
   $menu->remove_node('wp-logo'); // WordPress Logo
}, 999);

//Remove admin dashboard widgets.
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // Activity
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // At a Glance
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // Site Health Status
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPress Events and News
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Quick Draft
});
*/
// Add custom login form logo.
add_action('login_head', function () {
    $url = get_theme_file_uri('favicon.svg');

    $styles = [
        sprintf('background-image: url(%s)', $url),
        'width: 200px',
        'background-position: center',
        'background-size: contain',
    ];

    printf(
        '<style> .login h1 a { %s } </style>',
        implode(';', $styles)
    );
});
// Enqueue des scripts et des styles nécessaires
function enqueue_lightbox_scripts() {
    wp_localize_script('gallery-ajax', 'galleryAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_lightbox_scripts');

// AJAX handler pour charger les images de la galerie depuis un dossier
function load_gallery_images() {
    $image_folder_path = get_theme_file_uri() . '/inc/images/';

    $gallery_images = array();
    
    if (is_dir($image_folder_path)) {
        $image_files = scandir($image_folder_path);
        
        foreach ($image_files as $file) {
            if (in_array($file, array('.', '..'))) {
                continue;
            }
            
            $image_url = get_theme_file_uri() . '/inc/images/' . $file;
            $gallery_images[] = $image_url;
        }
    }
    
    wp_send_json_success($gallery_images);
}

add_action('wp_ajax_load_gallery_images', 'load_gallery_images');
add_action('wp_ajax_nopriv_load_gallery_images', 'load_gallery_images');
function wp_enqueue_custom_fonts() {
  wp_enqueue_style( 'space-mono', get_theme_file_uri() . '/inc/fonts/' );
  wp_enqueue_style( 'poppins', get_theme_file_uri() . '/inc/fonts/' );
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_custom_fonts' );

// Define the action for form submission
function custom_form_action_handler() {
    // Verify nonce
    if (isset($_POST['custom_form_nonce']) && wp_verify_nonce($_POST['custom_form_nonce'], 'custom_form_nonce')) {
        // Handle form data here
        
        // Load the template part
        get_template_part('template_part/formulaire', 'contact');
    }
}
add_action('admin_post_custom_form_action', 'custom_form_action_handler');
add_action('admin_post_nopriv_custom_form_action', 'custom_form_action_handler');
/*function activer_gutenberg_par_defaut() {
    // Désactive l'éditeur classique
    add_filter('use_block_editor_for_post', '__return_true', 100);

    // Active Gutenberg par défaut
    update_option('classic-editor-replace', 'block');

    // Désactive la demande de choix entre l'éditeur classique et Gutenberg
    update_option('classic-editor-allow-users', 'disallow');
}
add_action('admin_init', 'activer_gutenberg_par_defaut');*/
