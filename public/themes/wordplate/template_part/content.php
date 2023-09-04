<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?> <!-- Assurez-vous que cette ligne est présente -->
</head>
<body <?php body_class(); ?>>
<?php
/* Template Name: Page de Photos 

get_header(); */
?>


<main id="main" class="site-main">
    <?php
    global $wpdb;
    $query = "SELECT * FROM mytable";
    $data = $wpdb->get_results($query, ARRAY_A);

    if ($data) : // Check if there are results
        foreach ($data as $row) :
            // Check if the keys exist in the $row array before accessing them
            $reference = isset($row['reference']) ? $row['reference'] : '';
            $annee = isset($row['annee']) ? $row['annee'] : '';
            $format = isset($row['format']) ? $row['format'] : '';
            $type = isset($row['type']) ? $row['type'] : '';
            $fichier = isset($row['fichier']) ? $row['fichier'] : '';
            ?>

            <div id="sin">
                <div class="desktop-single-photo">
                    <img class="line" src="img/line-2.svg" />
                </div>
                <div class="frame">
                    <div class="team-mari-e">TEAM MARIÉE</div>
                    <div class="text-wrapper">RÉFÉRENCE : <?php echo esc_html($reference); ?></div>
                    <div class="text-wrapper">CATÉGORIE : MARIAGE</div>
                    <div class="text-wrapper">FORMAT : <?php echo esc_html($format); ?></div>
                    <div class="text-wrapper">TYPE : <?php echo esc_html($type); ?></div>
                    <div class="text-wrapper">ANNÉE : <?php echo esc_html($annee); ?></div>
                </div>
                <div class="vous-aimerez-AUSSI">VOUS AIMEREZ AUSSI</div>
                <p class="div">Cette photo vous intéresse ?</p>
                <img class="img" src="img/line-3.svg" />
                <img class="line-2" src="img/line-4.svg" />
                <img class="nathalie-jpeg" src="img/nathalie-15-jpeg.jpg" />
                <button class="CTA"><div class="charger-plus">Contact</div></button>
                <button class="charger-plus-wrapper"><div class="charger-plus">Toutes les photos</div></button>
                <div class="card-photo"></div>
                <div class="card-photo-2"></div>
            </div>

    <?php
        endforeach;
    else :
        echo 'Aucune photo trouvée.';
    endif;
    ?>
</main><!-- #main -->
