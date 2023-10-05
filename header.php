<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <?php if (!wp_is_mobile()) : ?>
            <nav class="menu-container">
               
                    <img src="http://localhost:10038/wp-content/themes/nathalie-mota/assets/images/Logo.svg" class="logo">
                      
        
               

                <?php
                $menu_args = array(
                    'theme_location' => 'navigation',
                    'container'      => 'ul',
                    'menu_class'     => 'menu-container',
                    /*'walker'         => new Custom_Walker_Nav_Menu()*/
                );
                wp_nav_menu($menu_args);
                ?>
            </nav>
        <?php endif; ?>

        <?php if (wp_is_mobile()) : ?>
            <header class="header">
               
            <img src="http://localhost:10038/wp-content/themes/nathalie-mota/assets/images/Logo.svg" class="logo">

                       
                    </div>
                
                <input class="menu-btn" type="checkbox" id="menu-btn" />
                <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                <nav class="menu">
                    <?php
                    $menu_args = array(
                        'theme_location' => 'navigation',
                        'container'      => 'ul',
                        'menu_class'     => 'menu-container',
                        /*'walker'         => new Custom_Walker_Nav_Menu()*/
                    );
                    wp_nav_menu($menu_args);
                    ?>
                </nav>
            </header>
        <?php endif; ?>
    </header>
