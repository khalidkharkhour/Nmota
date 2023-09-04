<?php
require 'inc/customize.php';
require 'inc/data/post.php';
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
add_action('wp_enqueue_scripts', function () {
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
    
});

// Load scripts as modules.
add_filter('script_loader_tag', function (string $tag, string $handle, string $src) {
    if (in_array($handle, ['vite', 'wordplate'])) {
        return '<script type="module" src="' . esc_url($src) . '" defer></script>';
    }

    return $tag;
}, 10, 3);

// Remove admin menu items.
add_action('admin_init', function () {
    remove_menu_page('edit-comments.php'); // Comments
    // remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('index.php'); // Dashboard
    // remove_menu_page('upload.php'); // Media
});

/* Remove admin toolbar menu items.
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
}, 999);*/

/* Remove admin dashboard widgets.
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // Activity
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // At a Glance
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // Site Health Status
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPress Events and News
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Quick Draft
});*/

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
/*class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        // Vérifier si l'élément de menu est "Contact"
        if (in_array('contact', $classes)) {
            $classes[] = 'js-modal'; // Ajouter la classe "js-modal"
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        $output .= '<li class="' . esc_attr($class_names) . '">';

        // Autres parties de la fonction start_el restent inchangées
        // ...

        $output .= '</li>';
    }
}*/
function wp_enqueue_custom_fonts() {
    wp_enqueue_style( 'space-mono', get_theme_file_uri() . '/inc/fonts/' );
    wp_enqueue_style( 'poppins', get_theme_file_uri() . '/inc/fonts/' );
  }
  add_action( 'wp_enqueue_scripts', 'wp_enqueue_custom_fonts' );
  