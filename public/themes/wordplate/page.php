<?php
get_header(); ?>



<?php
get_template_part('template_part/contact', 'modale');



global $wpdb;



$query = "SELECT * FROM mytable LIMIT 20";
$data = $wpdb->get_results($query, ARRAY_A);



if ($data) {
    $categories = array_unique(array_column($data, 'Catégorie'));
    $formats = array_unique(array_column($data, 'Format'));
    $années = array_unique(array_column($data, 'Année'));

    echo '<form id="flex" method="post" action="">';
    echo '<select class="cont-box" name="categorie" >';
    echo '<option value="Catégorie">Catégorie</option>';
    
    foreach ($categories as $categorie) {
        echo '<option value="' . esc_html($categorie) . '">' . esc_html($categorie) . '</option>';
    }
    
    echo '</select>';

    echo '<select class="cont-box" name="format">';
    echo '<option value="Format">Format</option>';
    
    foreach ($formats as $format) {
        echo '<option value="' . esc_html($format) . '">' . esc_html($format) . '</option>';
    }
    
    echo '</select>';

    echo '<select class="cont-box" name="annee">';
    echo '<option value="Année">Année</option>';
    
    foreach ($années as $année) {
        echo '<option id="color1" value="' . esc_html($année) . '">' . esc_html($année) . '</option>';
    }
    
    echo '</select>';
    echo '</form>';
} else {
    die('Erreur lors du chargement des données.');
}
// Récupérer l'URL actuelle
$current_url = esc_url($_SERVER['REQUEST_URI']);

// Divisez l'URL en segments en utilisant "/"
$url_segments = explode('/', $current_url);

// Le dernier segment de l'URL contient l'ID du post personnalisé
$custom_post_id = end($url_segments);

// Assurez-vous que l'ID est un nombre
if (is_numeric($custom_post_id)) {
    // Convertissez-le en entier
    $custom_post_id = intval($custom_post_id);
}
$page = get_post_meta($post->ID, 'singular_name', true);

if (empty($page)) {
    $page = '';
}

/*$photo_links = [
    'let-s-dance-3',
    'Santé !',
    'Et bon anniversaire !',
    "Let's party!",
    'Tout est installé',
    "Vers l'éternité",
    'Embrassez la mariée',
    'Dansons ensemble',
    'Le menu',
    'Au bal masqué',
    "Let's dance!",
    'Jour de match',
    'Préparation',
    'Bière ou eau plate ?',
    'Bouquet final',
    'Du soir au matin',
    'Team mariée'
];

foreach ($photo_links as $photo_name) {
    // Utilisez sanitize_title() pour formater le nom de la photo.
    $formatted_photo_name = sanitize_title($photo_name);
    
    $url = add_query_arg('photo', $formatted_photo_name, get_permalink($post->ID));
    echo '<a href="' . esc_url($url) . '">' . esc_html($photo_name) . '</a><br>';
}*/




$filteredData = $data;

$photo_links = [
    'let-s-dance',
    'Santé !',
    'Et bon anniversaire !',
    "Let's party!",
    'Tout est installé',
    "Vers l'éternité",
    'Embrassez la mariée',
    'Dansons ensemble',
    'Le menu',
    'Au bal masqué',
    "Let's dance!",
    'Jour de match',
    'Préparation',
    'Bière ou eau plate ?',
    'Bouquet final',
    'Du soir au matin',
    'Team mariée'
];

if ($filteredData) {
    echo '<div class="image-grid">';
    
    foreach ($filteredData as $index => $item) {
        if ($index >= 6) { // On vérifie si l'index est supérieur ou égal à 6
            echo '<div class="image-item">';
            
            // Utilisez sanitize_title() pour formater le nom de la photo.
            $formatted_photo_name = sanitize_title($photo_links[$index]);
            
            $url = add_query_arg('photo', $formatted_photo_name, get_permalink($post->ID));
            
            $custom_post_permalink = get_permalink($post->ID); // Définition de $custom_post_permalink
            
            echo '<a class="image-link" href="' . esc_url(get_theme_file_uri($item['Fichier'])) . '" data-fancybox="images" data-caption="<a href=' . esc_url($url) . '><i class=\'fa fa-eye\' aria-hidden=\'true\' data-toggle=\'details\' data-index=\'' . $index . '\'></i></a><p>' . $item['Catégorie'] . '</p><a href=' . esc_url($custom_post_permalink) . '>' . $item['Référence'] . '</a>">';
            
            echo '<img src="' . esc_url(get_theme_file_uri($item['Fichier'])) . '" alt="' . esc_attr($item['Titre']) . '" data-src="' . esc_url(get_theme_file_uri($item['Fichier'])) . '">'; // Display image

            echo '</a>';
            echo '</div>';
        }
    }
    
    echo '</div>';
} else {
    echo 'No images match the selected filters.';
}


$pageNumber = intval(get_query_var('page'));

$itemsPerPage = 6;
$totalPages = ceil(count($filteredData) / $itemsPerPage);
if ($pageNumber < $totalPages) {
    echo '<div class="cont-btn1">';
    echo '<button class="btn1" id="load-more">Charger plus</button>';
    echo '</div>';
} elseif ($pageNumber === $totalPages && $totalPages > 1) {
    echo '<button class="btn1" id="load-more">Retour</button>';
} else {
    // Si $pageNumber est égal à 1
    echo '<button class="btn1" id="load-more">Retour</button>';
}

// Calculate the starting index for the next set of items
$startIndex = ($pageNumber - 1) * $itemsPerPage;

// Get the next six items from the array
$nextItems = array_slice($filteredData, $startIndex, $itemsPerPage);

// Echo the JSON encoded array
echo '<script>window.filteredData = ' . json_encode($nextItems) . ';</script>';
echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        $(".image-link").fancybox({
            afterLoad: function(instance, current) {
                var caption = $(current.opts.$orig).data("caption");
                this.inner.find(".fancybox-caption").html(caption);
            }
        });
    });
</script>';

  
   
  

  

get_footer(); ?>
  
 


