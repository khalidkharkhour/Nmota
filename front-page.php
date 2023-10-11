<?php
/**
 * Modèle de la page d'accueil
 *
 * Ce fichier est utilisé pour afficher le contenu de la page d'accueil du site.
 * 
 * @package Nathalie-mota
 */

get_header();

$template = locate_template('template_part/contact-modale.php');
if ($template !== '') {
    get_template_part('template_part/contact', 'modale');
} else {
    echo 'Le fichier template_part/contact-modale.php n\'a pas été trouvé.';
}

$args = array(
    'post_type' => 'photo',
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'meta_key' => 'annees',
);

$order = isset( $_GET['order'] ) ? $_GET['order'] : 'desc';

if ( $order === 'asc' ) {
    $args['orderby'] = 'meta_value_num DESC';
}



$query = new WP_Query($args);

if ($query->have_posts()) {
    $categories = array();
    $formats = array();
    $annees = array();
    $references = array(); 

    while ($query->have_posts()) {
        $query->the_post();

     
        $post_categories = get_field('categories');
        $post_formats = get_field('format');
        $post_annees = get_field('annees');
        $post_references = get_field('references'); 

        if ($post_categories) {
            $categories = array_merge($categories, $post_categories);
        }

        if ($post_formats) {
            $formats = array_merge($formats, $post_formats);
        }

        if ($post_annees) {
            $annees = array_merge($annees, $post_annees);
        }

        if ($post_references) {
            $references = array_merge($references, $post_references);
        }
    }
  
    $categories = array_unique($categories);
    $formats = array_unique($formats);
    $annees = array_unique($annees);

 
    echo '<div id="flex">';

    echo '<form action="" method="post">';
    echo '<input type="hidden" name="postid" value="' . get_the_ID() . '">';
    echo '<input type="hidden" name="nonce" value="' . wp_create_nonce('flex') . '">';
    echo '<div class="custom-dropdown">';
    echo '<select id="categorie" class="select2" name="Catégorie">';
    echo '<option class="selected" value="Toutes">Catégories</option>';
    foreach ($categories as $categorie) {
        echo '<option value="' . esc_html($categorie) . '">' . esc_html($categorie) . '</option>';
    }
    echo '</select>';
    echo '</div>';
    echo '</form>';
    
  
    echo '<form action=" " method="post">';
    echo '<input type="hidden" name="postid" value="' . get_the_ID() . '">';
    echo '<input type="hidden" name="nonce" value="' . wp_create_nonce('flex') . '">';
    echo '<div class="custom-dropdown">';
    echo '<select id="format" class="select2" name="Format">';
    echo '<option value="Tous" class="selected">Formats</option>';
    foreach ($formats as $format) {
        echo '<option value="' . esc_html($format) . '">' . esc_html($format) . '</option>';
    }
    echo '</select>';
    echo '</div>';
    echo '</form>';


foreach ($annees as $annee) {
  
    echo '<form action="" method="post" data-date="' . esc_html($annee) . '">';
}
echo '<input type="hidden" name="postid" value="' . get_the_ID() . '">';
echo '<input type="hidden" name="nonce" value="' . wp_create_nonce('flex') . '">';
echo '<div class="custom-dropdown">';
echo '<select id="annee" class="select2  " name="Année">';
echo '<option value="Tout" class="selected">Trie par</option>';
echo '<option data-action="actualiser"  class="order-recentes" value="Les plus récentes">Les plus récentes</option>';
echo '<a data-action="actualiser"><option class="order-anciennes" value="Les plus anciennes">Les plus anciennes</option></a>';


echo '</select>';
echo '</div>';
echo '</form>';


    echo '</div>';

    wp_reset_postdata(); 
} else {
    echo 'Aucune image n\'a été trouvée pour le type de publication "photo".';
}

echo '<div id="image-grid">';
$query = new WP_Query($args);

$index = 0;
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $titre = get_field('titre');
       
        $categories = get_field('categories');
        if ($categories) {
            $categorie = implode(', ', $categories);
        } else {
            $categorie = '';
        }

      
        $image_url = get_field('image');
        $reference = get_field('reference');
        $format = get_field('format');
        $annee = get_field('annees');

        if ($reference) {
            $reference = implode(', ', $reference);
        }
        if ($annee) {
            $annee = implode(', ', $annee);
        }
        if ($format) {
            $format = implode(', ', $format);
        }

        if ($image_url) {
            $reference = get_field('reference');
            if ($reference) {
                $reference = implode(', ', $reference);
            }
            echo '<div class="image-item" data-index="' . $index . '" data-category="' . esc_html($categorie) . '" data-format="' . esc_html($format) . '" data-year="' . esc_html($annee) . '">';
            echo '<a href="' . esc_url($image_url) . '" class="fancybox" data-fancybox="images" data-caption="<p>' . $reference . ' ' . $categorie . '</p>">';
            echo '<i class="fas fa-expand show-on-hover"></i>';
            $post = get_permalink();
            echo '<a href="' . esc_url($post) . '"><i class="fas fa-eye show-on-hover"></i></a>';
            echo '<div id="flex3">';
            echo '<p class ="prag show-on-hover ">' . esc_html($titre) . '</p>';
            echo '<p class ="prag show-on-hover">' . esc_html($categorie) . '</p>';
            echo '</div>';
            echo '<img src="' . esc_url($image_url) . '" alt="' . $titre . '" />';
            echo '</a>';
            echo '</div>';
        }
        $index++; 

    endwhile;
    wp_reset_postdata(); 
else :
    echo 'Aucune image n\'a été trouvée pour le type de publication "photo".';
endif;
echo '</div>';
echo '<div class="cont-btn1">';
echo '<form id="load-more-form" method="post">';
echo '<input type="hidden" name="postid" value="' . get_the_ID() . '">';
echo '<input type="hidden" name="nonce" value="' . wp_create_nonce('load-more-action') . '">';
echo '<button type="submit" class="btn1" id="load-more">Charger plus</button>';
echo '</form>';
echo '<input  type="hidden" name="nonce" value="' . wp_create_nonce('return-button-action') . '">';
echo '<button class="btn1" id="return-button" >Retour</button>';
echo '</div>';

get_footer();
