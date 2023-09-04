<?php
/* Template Name: Page de Photos */



// La boucle personnalisée pour afficher les publications personnalisées "photo"
$args = array(
    'post_type' => 'photo', // Le type de publication personnalisé
    'posts_per_page' => -1 // Afficher toutes les publications
);

// Utilisation d'un modèle partiel pour afficher une seule photo
$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        // Récupérer les informations nécessaires
        $reference = get_post_meta(get_the_ID(), 'reference', true);
        $annee = get_post_meta(get_the_ID(), 'annee', true);
        $format = get_post_meta(get_the_ID(), 'format', true);
        $type = get_post_meta(get_the_ID(), 'type', true);
        $fichier = get_post_meta(get_the_ID(), 'fichier', true);

        // Afficher le titre et le lien vers la page détaillée
        echo '<h2><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h2>';
        echo '<p>Référence : ' . esc_html($reference) . '</p>';
        echo '<p>Année : ' . esc_html($annee) . '</p>';
        echo '<p>Format : ' . esc_html($format) . '</p>';
        echo '<p>Type : ' . esc_html($type) . '</p>';
        echo '<p>Fichier : ' . esc_html($fichier) . '</p>';

    endwhile;

    wp_reset_postdata();
else :
    echo 'Aucune photo trouvée.';
endif;
