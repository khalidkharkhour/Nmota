<?php
get_header(); 
$template = locate_template('template_part/contact-modale.php');
if ($template !== '') {
    get_template_part('template_part/contact', 'modale');
} else {
    echo 'Le fichier template_part/contact-modale.php n\'a pas été trouvé.';
}

$args = array(
    'post_type' => 'photo', // Type de publication personnalisé "photo"
    'posts_per_page' => -1, // Pour afficher toutes les images
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    $categories = array();
    $formats = array();
    $annees = array();

    while ($query->have_posts()) {
        $query->the_post();
    
        // Récupérer les valeurs des champs ACF pour chaque post
        $post_categories = get_field('categories');
        $post_formats = get_field('format');
        $post_annees = get_field('annees');

        // Vérifier si les valeurs sont des tableaux
        if (is_array($post_categories)) {
            $categories = array_merge($categories, $post_categories);
        }

        if (is_array($post_formats)) {
            $formats = array_merge($formats, $post_formats);
        }

        if (is_array($post_annees)) {
            $annees = array_merge($annees, $post_annees);
        }
    }

    // Supprimer les doublons en conservant l'ordre
    $categories = array_unique($categories);
    $formats = array_unique($formats);
    $annees = array_unique($annees);

    // Afficher les sélecteurs
    echo '<div id="flex">';
    
    // Sélecteur pour les catégories
    echo '<div class="custom-dropdown" >';
    echo '<select  class="options" id="categorie " name="Catégorie">';
    echo '<option class="selected" value="Catégorie">Catégorie</option>';
    foreach ($categories as $categorie) {
        echo '<option value="' . esc_html($categorie) . '">' . esc_html($categorie) . '</option>';
    }
    echo '</select>';
    echo '</div>';

    // Sélecteur pour les formats
    echo '<div class="custom-dropdown">';
    echo '<select  class="options" id="format " name="Format">';
    echo '<option value="Format" class="selected" ">Format</option>';
    foreach ($formats as $format) {
        echo '<option value="' . esc_html($format) . '">' . esc_html($format) . '</option>';
    }
    echo '</select>';
    echo '</div>';

    // Sélecteur pour les années
    echo '<div class="custom-dropdown">';
    echo '<select  class="options " id="annee" name="Année">';
    echo '<option value="Année">Année</option>';
    foreach ($annees as $annee) {
        echo '<option value="' . esc_html($annee) . '">' . esc_html($annee) . '</option>';
    }
    echo '</select>';
    echo '</div>';
    
    echo '</div>';
    
    wp_reset_postdata(); // Réinitialiser la requête
} else {
    echo 'Aucune image n\'a été trouvée pour le type de publication "photo".';
}

$args = array(
    'post_type' => 'photo', // Type de publication personnalisé "photo"
    'posts_per_page' => -1, // Pour afficher toutes les images
);
echo '<div  id="image-grid">';
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
// Récupérer la valeur du champ 'categories'
//
        // Récupérer l'URL de l'image depuis le champ personnalisé 'image'
       

        $image_url = get_field('image');
        if ($image_url) {
           
            echo '<div id="image-container " class="image-item" data-category="' . esc_html($categorie) . '" data-format="' . esc_html($format) . '" data-year="' . esc_html($annee) . '">';
            echo '<img src="' . esc_url($image_url) . '" alt="' . get_the_title() . '" />';
            echo '</div>';
        }

    endwhile;
    wp_reset_postdata(); // Réinitialiser la requête
else :
    echo 'Aucune image n\'a été trouvée pour le type de publication "photo".';
endif;
echo '</div>';

get_footer();
