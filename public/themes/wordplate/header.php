<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); 
    ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <nav class="menu-container">
            <?php if (get_theme_mod('logo_setting')) : ?>
                <div class="logo">
                    <li> <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img class="logo" src="<?php echo esc_url(get_theme_mod('logo_setting')); ?>" alt="<?php bloginfo('name'); ?> Logo">
                        </a></li>
                </div>
            <?php endif; ?>

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
        <?php if (is_mobile()): ?>
            <nav role="navigation">
  <div id="menuToggle">
   
   
    <input type="checkbox" />
    

    <span></span>
    <span></span>
    <span></span>
    
    
    <ul id="menu">
      <a href="#"><li>Acceuil</li></a>
      <a href="#"><li>A propos </li></a>
      <a href="#"><li>Contact</li></a>
    
    </ul>
  </div>
</nav>
   
<?php endif; ?>


    </header>