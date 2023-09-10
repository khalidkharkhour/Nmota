<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mota</title>
  <link rel="stylesheet" href="<?php echo get_theme_file_uri('/inc/style.css'); ?>">
  <script src="<?php echo esc_url(get_theme_file_uri('/inc/costum.js')); ?>" defer></script>
</head>

<?php  
get_template_part('contact-modale');
$reference = get_post_meta(get_the_ID(), 'reference', true);
$annee = get_post_meta(get_the_ID(), 'annee', true);
$format = get_post_meta(get_the_ID(), 'format', true);
$type = get_post_meta(get_the_ID(), 'type', true);
$fichier = get_post_meta(get_the_ID(), 'fichier', true);
$fichier = str_replace('/inc/images', 'themes/wordplate/inc/images', $fichier);      ?>



<div class="logoo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img class="logoo" src="<?php echo esc_url(get_theme_mod('logo_setting')); ?>" alt="<?php bloginfo('name'); ?> Logo">
    </a>
</div>




<nav class="menu-container">
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


<div id="app">
<div class="index">
<div class="footer-desktop ">
    <div class="group">
        
    </div><img class="line" alt="Line" src="https://anima-uploads.s3.amazonaws.com/projects/63eb64c02e370d1798fe97e7/releases/64df017d18733b734262d811/img/line-2.svg">
</div>
<div class="frame">
            <div class=" team-mari-e">TEAM MARIÉE</div>
            <div class="text-wrapper">RÉFÉRENCE : <?php echo esc_html($reference); ?></div>
            <div class="text-wrapper">CATÉGORIE : <?php echo esc_html($type); ?></div>
            <div class="text-wrapper">FORMAT : <?php echo esc_html($format); ?></div>
            <div class="text-wrapper">TYPE : <?php echo esc_html($type); ?></div>
            <div class="text-wrapper">ANNÉE : <?php echo esc_html($annee); ?></div>
        </div>
        <div class="vous-aimerez-AUSSI">VOUS AIMEREZ AUSSI</div>

<p class="div">Cette photo vous intéresse ?</p>
<img class="line-2" alt="Line" src="https://anima-uploads.s3.amazonaws.com/projects/63eb64c02e370d1798fe97e7/releases/64df43628ee8453fffe9bfb1/img/line-4.svg">
<div class="galler galler-item" id="#gallery-1">
    <?php echo do_shortcode('[gallery ids="41778,41777,41776,41775,41774,41769,41771,41773"][gallery ids="41762,41761"]'); ?>
    <span class="prev galler-icon"></span>
    <span class="next galler-icon"></span>

    <?php echo '<img src="' . $fichier . '" class="nathalie-jpeg">'; ?>
</div>

<div class="CTA CTA-instance">
    <div class="charger-plus" id="">Contact</div>
</div>


<div class="CTA CTA-3">



    <div class="charger-plus CTA-2">Toutes les photos</div>

</div>
<div class="card-photo"></div>
<div class="card-photo-2"></div>
</div>
</div>
<?php get_footer();?>

  
