<?php
get_header(); ?>



<?php
get_template_part('template_part/contact', 'modale');




$json = '[
    {
     "Fichier": "/inc/images/nathalie-0.webp",
     "Titre": "Santé !",
     "Référence": "bf2385",
     "Catégorie": "Réception",
     "Année": 2019,
     "Format": "paysage",
     "Type": "Argentique"
    },
    {
     "Fichier": "/inc/images/nathalie-1.webp",
     "Titre": "Et bon anniversaire ! ",
     "Référence": "bf2386",
     "Catégorie": "Réception",
     "Année": 2020,
     "Format": "paysage",
     "Type": "Argentique"
    },
    {
     "Fichier": "/inc/images/nathalie-2.webp",
     "Titre": "Let/s party!",
     "Référence": "bf2387",
     "Catégorie": "Concert",
     "Année": 2021,
     "Format": "paysage",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-3.webp",
     "Titre": "Tout est installé",
     "Référence": "bf2388",
     "Catégorie": "Mariage",
     "Année": 2019,
     "Format": "portrait",
     "Type": "Argentique"
    },
    {
     "Fichier": "/inc/images/nathalie-4.webp",
     "Titre": "Vers l/éternité",
     "Référence": "bf2389",
     "Catégorie": "Mariage",
     "Année": 2020,
     "Format": "portrait",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-5.webp",
     "Titre": "Embrassez la mariée ",
     "Référence": "bf2390",
     "Catégorie": "Mariage",
     "Année": 2021,
     "Format": "portrait",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-6.webp",
     "Titre": "Dansons ensemble",
     "Référence": "bf2391",
     "Catégorie": "Mariage",
     "Année": 2020,
     "Format": "paysage",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-7.webp",
     "Titre": "Le menu ",
     "Référence": "bf2392",
     "Catégorie": "Mariage",
     "Année": 2019,
     "Format": "paysage",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-8.webp",
     "Titre": "Au bal masqué",
     "Référence": "bf2393",
     "Catégorie": "Concert",
     "Année":2021,
     "Format": "portrait",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-9.webp",
     "Titre": "Let/s dance!",
     "Référence": "bf2394",
     "Catégorie": "Mariage",
     "Année": 2022,
     "Format": "paysage",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-10.webp",
     "Titre": "Jour de match",
     "Référence": "bf2395",
     "Catégorie": "Télévision",
     "Année": " 2022",
     "Format": "paysage",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-11.webp",
     "Titre": "Préparation ",
     "Référence": "bf2396",
     "Catégorie": "Concert",
     "Année": 2022,
     "Format": "paysage",
     "Type": "Argentique"
    },
    {
     "Fichier": "/inc/images/nathalie-12.webp",
     "Titre": "Bière ou eau plate ?",
     "Référence": "bf2397",
     "Catégorie": "Concert",
     "Année": 2022,
     "Format": "paysage",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-13.webp",
     "Titre": "Bouquet final",
     "Référence": "bf2398",
     "Catégorie": "Mariage",
     "Année": 2022,
     "Format": "portrait",
     "Type": "Numérique"
    },
    {
     "Fichier": "/inc/images/nathalie-14.webp",
     "Titre": "Du soir au matin",
     "Référence": "bf2399",
     "Catégorie": "Mariage",
     "Année": 2022,
     "Format": "portrait",
     "Type": "Argentique"
    },
    {
     "Fichier": "/inc/images/nathalie-15.webp",
     "Titre": "Team mariée ",
     "Référence": "bf2400",
     "Catégorie": "Mariage",
     "Année": 2022,
     "Format": "portrait",
     "Type": "Numérique"
    }
   ]';

$data = json_decode($json, true);

if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Erreur lors du décodage JSON: ' . json_last_error_msg());
}

if ($data) {
    $categories = array_unique(array_column($data, 'Catégorie'));
    $formats = array_unique(array_column($data, 'Format'));
    $années = array_unique(array_column($data, 'Année'));


    echo '<form id="flex" method="post" action="">';
    echo '<select class="cont-box" name="categorie">';
    echo '<option value="Catégorie">Catégorie</option>';
    foreach ($categories as $categorie) {
        echo '<option value="' . htmlspecialchars($categorie) . '">' . htmlspecialchars($categorie) . '</option>';
    }
    echo '</select>';

    echo '<select class="cont-box" name="format">';
    echo '<option value="Format">Format</option>';
    foreach ($formats as $format) {
        echo '<option value="' . htmlspecialchars($format) . '">' . htmlspecialchars($format) . '</option>';
    }
    echo '</select>';

    echo '<select class ="cont-box"  name="annee">';
    echo '<option value="Année">Année</option>';
    foreach ($années as $année) {
        echo '<option value="' . htmlspecialchars($année) . '"><span id="btn2">' . htmlspecialchars($année) . '</span> </option>';
    }
    echo '</select>';

    /* echo '<input type="submit" value="Filtrer">'; */
    echo '</form>';
} else {
    die('Erreur lors du décodage JSON');
}

$filteredData = $data;


if ($filteredData) {
    echo '<div class="image-grid">';

    foreach ($filteredData as $index => $item) {
        if ($index >= 6) {
            echo '<div class="image-item">';

            // Generate a unique identifier for the link using the index
            $element_id = 'image_' . $index;

            echo '<a class="image-link" data-fancybox="images" href="' . get_theme_file_uri($item['Fichier']) . '" data-caption="<a href=\'#' . $element_id . '\'><i class=\'fa fa-eye\' aria-hidden=\'true\'></i></a> <p>'
                . $item['Catégorie'] . '</p> <a href=\'#' . $element_id . '\'>' . $item['Référence'] . '</a>"">';

            echo '<img src="' . get_theme_file_uri($item['Fichier']) . '" alt="' . $item['Titre'] . '" data-src="' . get_theme_file_uri($item['Fichier']) . '">'; // Display image

            echo '</a>';

            echo '</div>';
        }
    }

    echo '</div>';
} else {
    echo 'No images match the selected filters.';
}

// Rest of your code...

$pageNumber = intval(get_query_var('page'));

$itemsPerPage = 12;
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
  
 

