<?php 

get_template_part('template_part/photo','single');


// Récupérez le paramètre 'photo' de la chaîne de requête
$photo_param = isset($_GET['photo']) ? sanitize_text_field($_GET['photo']) : '';

if (!empty($photo_param)) {
    // Utilisez la valeur de $photo_param pour inclure le template part approprié
    get_template_part('template_part/photo', $photo_param);
} else {
    // Gérer le cas où le paramètre 'photo' est manquant ou vide
    echo "Le paramètre 'photo' est manquant ou vide.";
}


/* Template Name: Page de Photos */

// Récupérer le titre de la photo à afficher à partir du paramètre d'URL
$photo_title = isset($_GET['photo_title']) ? sanitize_text_field($_GET['photo_title']) : '';

// La boucle personnalisée pour afficher les publications personnalisées "photo" par titre
$args = array(
    'post_type' => 'photo', // Le type de publication personnalisé
    'posts_per_page' => 1, // Afficher une seule publication
    'post_title' => $photo_title, // Filtre par titre
);

// Utilisation d'un modèle partiel pour afficher la photo
$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        // Récupérer les informations nécessaires
        $reference = get_post_meta(get_the_ID(), 'reference', true);
        $annee = get_post_meta(get_the_ID(), 'annee', true);
        $format = get_post_meta(get_the_ID(), 'format', true);
        $type = get_post_meta(get_the_ID(), 'type', true);
        $fichier = get_post_meta(get_the_ID(), 'fichier', true);

        $post_id = get_post_meta(get_the_ID(), true);
        $photo_title = sanitize_title(get_the_title());
        $custom_link = "/?photo=" . $photo_title;

        $fichier = str_replace('/inc/images', 'themes/wordplate/inc/images', $fichier);

        // Commencez la section HTML ici
?>
       
<?php
    // Fin de la section HTML
    endwhile;

else :
    echo 'Aucune photo trouvée avec le titre "' . esc_html($photo_title) . '".';
endif;

?>
