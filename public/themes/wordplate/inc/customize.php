<?php
function custom_theme_customize_register($wp_customize) {
    // Section pour le logo
    $wp_customize->add_section('logo_section', array(
        'title' => __('Logo', 'votre-theme'),
        'priority' => 30,
    ));

    // Contrôle pour le logo
    $wp_customize->add_setting('logo_setting', array(
        'sanitize_callback' => 'esc_url_raw', // Valider l'URL du logo
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_control', array(
        'label' => __('Sélectionnez votre logo', 'votre-theme'),
        'section' => 'logo_section',
        'settings' => 'logo_setting',
    )));

    // Section pour la typographie
    $wp_customize->add_section('typography_section', array(
        'title' => __('Typographie', 'votre-theme'),
        'priority' => 30,
    ));

    // Contrôle pour la typographie
    $wp_customize->add_setting('typography_setting', array(
        'default' => 'Arial, sans-serif', // Typographie par défaut
        'sanitize_callback' => 'sanitize_text_field', // Valider la typographie
    ));

    $wp_customize->add_control('typography_control', array(
        'type' => 'text',
        'label' => __('Sélectionnez votre typographie', 'votre-theme'),
        'section' => 'typography_section',
        'settings' => 'typography_setting',
    ));

    // Section pour les galeries d'images
    $wp_customize->add_section('gallery_section', array(
        'title' => __('Galeries d\'images', 'votre-theme'),
        'priority' => 30,
    ));

    // Contrôle pour les galeries d'images
    $wp_customize->add_setting('gallery_setting', array(
        'default' => 'default', // Style de galerie par défaut
        'sanitize_callback' => 'sanitize_text_field', // Valider le style de galerie
    ));

    $wp_customize->add_control('gallery_control', array(
        'type' => 'select',
        'label' => __('Sélectionnez le style de galerie', 'votre-theme'),
        'section' => 'gallery_section',
        'settings' => 'gallery_setting',
        'choices' => array(
            'default' => __('Style par défaut', 'votre-theme'),
            'grid' => __('Grille', 'votre-theme'),
            'slider' => __('Slider', 'votre-theme'),
        ),
    ));
}
add_action('customize_register', 'custom_theme_customize_register');
