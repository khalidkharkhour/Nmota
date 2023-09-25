<?php
get_header(); ?>
<div id="front-photo-page">
    <?php
    get_template_part('template_part/contact', 'modale');
    global $wpdb;
    $query = "SELECT * FROM mytable LIMIT 20";
    $data = $wpdb->get_results($query, ARRAY_A);
    if ($data) {
        $categories = array_unique(array_column($data, 'Catégorie'));
        $formats = array_unique(array_column($data, 'Format'));
        $années = array_unique(array_column($data, 'Année'));
        // In your theme's functions.php or a custom file (e.g., custom-config.php)
        class MyCustomConfig
        {
            public static function getPDO()
            {
                // Your custom PDO configuration here
                $pdo = new PDO('mysql:host=localhost;dbname=mott', 'khar', 'nbvcxw');
                return $pdo;
            }
        }

        require "../vendor/autoload.php";
        try {
            $pdo = MyCustomConfig::getPDO();
            $images = $pdo->query("SELECT Fichier, Titre, Référence, Catégorie, Année, Format, Type, custom_css FROM mytable");
        } catch (PDOException $e) {
            echo "PDO Exception: " . $e->getMessage();
        }


        echo '<div id="flex">';
        echo ' <div class="custom-dropdown">';
        echo '<select class="options" id="categorie" name="Catégorie">';
        //echo '<span class="">Catégorie</span>';
        echo '<option class="selected" value="Catégorie">Catégorie</option>';
        foreach ($categories as $categorie) {
            echo '<option value="' . esc_html($categorie) . '">' . esc_html($categorie) . '</option>';
        }
        echo '</select>';
        echo '</div>';
        echo ' <div class="custom-dropdown">';
        echo '<select class="options" id="format" name="Format">';
        //echo '<span class="">Format</span>';
        echo '<option value="Format" class="selected" value="Format">Format</option>';
        foreach ($formats as $format) {
            echo '<option value="' . esc_html($format) . '">' . esc_html($format) . '</option>';
        }
        echo '</select>';
        echo '</div>';
        echo ' <div class="custom-dropdown">';
        echo '<select class="options " id="annee" name="Année">';
        //echo '<span class="">Année</span>';
        echo '<option value="Année">Année</option>';
        foreach ($années as $année) {
            echo '<option value="' . esc_html($année) . '">' . esc_html($année) . '</option>';
        }
        echo '</select>';
        echo '</div>';
        echo '</div>';
    } else {
        die('Erreur lors du chargement des données.');
    }
    // Récupération l'URL actuelle
    $current_url = esc_url($_SERVER['REQUEST_URI']);
    // Division l'URL en segments en utilisant "/"
    $url_segments = explode('/', $current_url);
    // Le dernier segment de l'URL contient l'ID du post personnalisé
    $custom_post_id = end($url_segments);
    // l'ID est un nombre
    if (is_numeric($custom_post_id)) {
        //  en entier
        $custom_post_id = intval($custom_post_id);
    }
    $page = get_post_meta($post->ID, 'singular_name', true);
    if (empty($page)) {
        $page = '';
    }
    $filteredData = $data;
    $photo_links = [
        "0.webp" => "sante", //themes/wordplate/inc/images/0.webp
        "1.webp" => 'et-bon-anniversaire', //themes/wordplate/inc/images/1.webp
        "2.webp" =>  "lets-party", //themes/wordplate/inc/images/2.webp
        "3.webp" =>  'tout-est-installe', //themes/wordplate/inc/images/3.webp
        "4.webp" =>  "vers-leternite", //themes/wordplate/inc/images/4.webp
        "5.webp" => 'embrassez-la-mariee', //themes/wordplate/images/5.webp
        "6.webp" => 'dansons-ensemble', //themes/wordplate/inc/images/6.webp
        "7.webp" => 'le-menu', //themes/wordplate/inc/images/7.webp
        "8.webp" => 'au-bal-masque', //themes/wordplate/inc/images/8.webp
        "9.webp" => "let-s-dance", //themes/wordplate/inc/images/9.webp
        "10.webp" => 'jour-de-match', //themes/wordplate/inc/images/10.webp
        "11.webp" => 'preparation', //themes/wordplate/inc/images/11.webp
        "12.webp" => 'biere-ou-eau-plate', //themes/wordplate/inc/images/12.webp
        "13.webp" => 'bouquet-final', //themes/wordplate/inc/images/13.webp
        "14.webp" => 'du-soir-au-matin', //themes/wordplate/inc/images/14.webp
        "15.webp" => 'team-mariee' //themes/wordplate/inc/images/15.webp
    ];
    if ($filteredData) {
        echo '<div class="image-grid">';
        foreach ($filteredData as $index => $item) {
            if ($index >= 6) { // On vérifie si l'index est supérieur ou égal à 6
                echo '<div class="image-item">';
                $photo_filename = basename($item['Fichier']); // Obtenir le nom du fichier image
                $image_src = wp_attachment_image_src($attachment_id);
                $attachment_id = attachment_url_to_postid($item['Fichier']);
                $url = esc_url(get_theme_file_uri($item['Fichier']));
    
                if (isset($photo_links[$photo_filename])) {
                    $photo_caption = $photo_links[$photo_filename];
                } else {
                    $photo_caption = ''; // Aucune légende par défaut si le lien n'est pas trouvé
                }
                $url = add_query_arg('photo', sanitize_title($photo_caption), get_permalink($post->ID));
                $custom_post_permalink = get_permalink($post->ID); // Définition de $custom_post_permalink
    
                // Add the <i> element to the image link
                echo '<a class="image-link" href="' . esc_url(get_theme_file_uri($item['Fichier'])) . '" data-fancybox="images" data-caption="<a href=' . esc_url($url) . '><i class=\'eye\' aria-hidden=\'true\' data-toggle=\'details\' data-index=\'' . $index . '\'></i></a><p>' . $item['Titre'] . '</p><a href=' . esc_url($custom_post_permalink) . '>' . $item['Référence'] . '</a>">';
                
                echo '<img  src="' . esc_url(get_theme_file_uri($item['Fichier'])) . '" alt="' . esc_attr($item['Titre']) . '" data-src="' . esc_url(get_theme_file_uri($item['Fichier'])) . '">';
                
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
        echo '<button class="btn1" id="return-button" style="display: none;">Retour</button>';
        echo '</div>';
    } elseif ($pageNumber === $totalPages && $totalPages > 1) {
        echo '<button class="btn1" id="load-more" style="display: none;">Charger plus</button>';
        echo '<button class="btn1" id="return-button">Retour</button>';
    } elseif ($pageNumber === 16) {
        echo '<button class="btn1" id="return-button">Retour</button>';
    } else {
        echo '<button class="btn1" id="load-more">Retour</button>';
    }
    $startIndex = ($pageNumber - 1) * $itemsPerPage;
    $nextItems = array_slice($filteredData, $startIndex, $itemsPerPage);
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

</div>