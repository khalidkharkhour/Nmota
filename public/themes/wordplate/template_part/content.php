<?php
/* Template Name: Page de Photos */

get_header(); // Inclure l'en-tête WordPress

?>

<?php

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) : $custom_query->the_post();
                // Récupérer les informations nécessaires
                $reference = get_post_meta(get_the_ID(), 'reference', true);
                $annee = get_post_meta(get_the_ID(), 'annee', true);
                $format = get_post_meta(get_the_ID(), 'format', true);
                $type = get_post_meta(get_the_ID(), 'type', true);
                $fichier = get_post_meta(get_the_ID(), 'fichier', true);
                ?>
<body id="sin">
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
            endwhile;

            wp_reset_postdata();
        else :
            echo 'Aucune photo trouvée.';
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); // Inclure le pied de page WordPress ?>
