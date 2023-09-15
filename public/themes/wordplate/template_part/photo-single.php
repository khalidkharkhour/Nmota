<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mota</title>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('/inc/style.min.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo esc_url(get_theme_file_uri('/inc/costum.js')); ?>" defer></script>
</head>

<body id="single-photo-page">
    <header class="header">
        <?php
        get_header();
        get_template_part('template_part/contact-modale');
        ?>
    </header>
    <?php
    $categories = [
        "0.webp" => "Réception",
        "1.webp" => "Réception ",
        "2.webp" => "Télévision",
        "3.webp" => "Concert",
        "4.webp" =>  "Concert",
        "5.webp" =>   "Mariage",
        "6.webp" => "Mariage",
        "7.webp" => "Mariage",
        "8.webp" => "Concert",
        "9.webp" => "Mariage",
        "10.webp" => "Mariage",
        "11.webp" => "Mariage",
        "12.webp" => "Mariage",
        "13.webp" => "Mariage",
        "14.webp" => "Concert",
        "15.webp" =>  "Mariage"
    ];

    $reference = get_post_meta(get_the_ID(), 'reference', true);
    $annee = get_post_meta(get_the_ID(), 'annee', true);
    $format = get_post_meta(get_the_ID(), 'format', true);
    $type = get_post_meta(get_the_ID(), 'type', true);
    $fichier = get_post_meta(get_the_ID(), 'fichier', true);
    $fichier = str_replace('/inc/images', 'themes/wordplate/inc/images', $fichier);
    ?>
    <div id="app">
        <div class="index">
        </div>
        <article class="frame">
            <div class="flex">
                <h1 class="team-mari-e">TEAM MARIÉE</h1>
                <p class="text-wrapper">RÉFÉRENCE :<?php echo esc_html($reference); ?></p>
                <p class="text-wrapper">CATÉGORIE : <?php echo isset($categories[basename($fichier)]) ? $categories[basename($fichier)] : 'Catégorie inconnue'; ?></p>
                <p class="text-wrapper">FORMAT :<?php echo esc_html($format); ?></p>
                <p class="text-wrapper">TYPE :<?php echo esc_html($type); ?></p>
                <p class="text-wrapper">ANNÉE :<?php echo esc_html($annee); ?></p>
                <span class="line text-wrapper"></span>
            </div>
            <div class="image-wrapper">
                <img src="<?php echo esc_html($fichier); ?>" class="nathalie-jpeg">
            </div>
        </article>
        <div>
            <?php
            echo '<article id="flex-cont">';
            echo '<div id="flex-cont1">';
            echo '<p class="div">Cette photo vous intéresse ?</p>';
            echo '<div id="contact" class="charger-plus" data-ref-photo="' . esc_attr($reference) . '">Contact</div>';
            echo '</div>';
            echo '<div class="gallery-wrapper">';
            echo '<div class="galler galler-item" id="gallery-1">';
            echo do_shortcode('[gallery ids="41778,41777,41776,41775,41774,41769,41771,41773"][gallery ids="41762,41761"]');
            echo '</div>';
            echo '<span class="prev fa fa-arrow-left"></span>';
            echo '<span class="next fa fa-arrow-right"></span>';
            echo '</div>';
            echo '</article>';
            ?>
        </div>
    </div>
    <section>
        <span class="line2 text-wrapper"></span>
        <picture id="flex-cont2">
            <h3 class="vous-aimerez-AUSSI">VOUS AIMEREZ AUSSI</h3>
            <div class="images-container">
                <div class="card-photo card-photo-0"></div>
                <div class="card-photo card-photo-1"></div>
            </div>
            <div>
                <a href="http://localhost:8000/#images-1" class="CTA-2">Toutes les photos</a>
            </div>
        </picture>
    </section>
    <?php get_footer(); ?>
</body>

</html>