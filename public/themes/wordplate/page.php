
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

    echo '<div id="flex" >';
    echo ' <div class="custom-dropdown">';
    echo '<select class="options" id="categorie" name:"Catégorie" >';
    echo'<span class="">Catégorie</span>';
    echo '<option class="selected" value="Catégorie">Catégorie</option>';
    
    foreach ($categories as $categorie) {
        echo '<option value="' . esc_html($categorie) . '">' . esc_html($categorie) . '</option>';
    }
    
    echo '</select>';
    echo'</div>';
    echo ' <div class="custom-dropdown">';
    echo '<select  class="options" id="format" name:"Format">';
    echo'<span class="">Format</span>';
   echo '<option class="selected" value="Format">Format</option>';
   foreach ($formats as $format) {
    echo '<option value="' . $format . '">' . $format . '</option>';
}

echo '</select>';
echo '</div>';
echo ' <div class="custom-dropdown">';
echo '<select class="options" id="annee" name="Année">';
echo '<span class="">Année</span>';
echo '<option value="Année">Année</option>'; // Remove the class="options" from here

foreach ($années as $année) {
    echo '<option value="' . esc_html($année) . '">' . esc_html($année) . '</option>';
}

echo '</select>';
echo '</div>';
echo '</div>';

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
    
    "0.webp" => "Santé !",//themes/wordplate/inc/images/0.webp
    "1.webp" => 'Et bon anniversaire !',//themes/wordplate/inc/images/1.webp
    "2.webp" =>  "Let's party!",//themes/wordplate/inc/images/2.webp
    "3.webp" =>  'Tout est installé',//themes/wordplate/inc/images/3.webp
    "4.webp" =>  "Vers l'éternité",//themes/wordplate/inc/images/4.webp
    "5.webp" => 'Embrassez la mariée',//themes/wordplate/images/5.webp
    "6.webp" => 'Dansons ensemble',//themes/wordplate/inc/images/6.webp
    "7.webp" => 'Le menu',//themes/wordplate/inc/images/7.webp
    "8.webp" => 'Au bal masqué',//themes/wordplate/inc/images/8.webp
    "9.webp" => "Let's dance!",//themes/wordplate/inc/images/9.webp
    "10.webp" => 'Jour de match',//themes/wordplate/inc/images/10.webp
    "11.webp" => 'Préparation',//themes/wordplate/inc/images/11.webp
    "12.webp" => 'Bière ou eau plate ?',//themes/wordplate/inc/images/12.webp
    "13.webp" => 'Bouquet final',//themes/wordplate/inc/images/13.webp
    "14.webp" => 'Du soir au matin',//themes/wordplate/inc/images/14.webp
    "15.webp" => 'Team mariée'//themes/wordplate/inc/images/15.webp
];


if ($filteredData) {
    echo '<div class="image-grid">';
    
    foreach ($filteredData as $index => $item) {
        if ($index >= 6) { // On vérifie si l'index est supérieur ou égal à 6
            echo '<div class="image-item">';
            
            $photo_filename = basename($item['Fichier']); // Obtenir le nom du fichier image
            
            if (isset($photo_links[$photo_filename])) {
                $photo_caption = $photo_links[$photo_filename];
            } else {
                $photo_caption = ''; // Aucune légende par défaut si le lien n'est pas trouvé
            }
            
            $url = add_query_arg('photo', sanitize_title($photo_caption), get_permalink($post->ID));
            
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
/*echo '<script>
function remplacerSelectParListe(selectId) {
  const select = document.getElementById(selectId);
  const options = select.querySelectorAll("option");
  const parentDiv = select.parentElement;

  const ul = document.createElement("ul");
  ul.className = "options";

  const selected = document.createElement("span");
  selected.textContent = options[0].textContent;
  selected.className = "selected";

  selected.addEventListener("click", () => {
    ul.classList.toggle("open");
  });

  options.forEach((option) => {
    const li = document.createElement("li");
    li.textContent = option.textContent;
    li.value = option.value;

    li.addEventListener("click", () => {
      selected.textContent = option.textContent;
      ul.classList.remove("open");
    });

    ul.appendChild(li);
  });

  parentDiv.removeChild(select);
  parentDiv.appendChild(selected);
  parentDiv.appendChild(ul);
}

// Appel de la fonction pour chaque conteneur de select
remplacerSelectParListe("categorie");
remplacerSelectParListe("format");
remplacerSelectParListe("annee");

  
  </script>';*/
get_footer(); ?>
  
 


