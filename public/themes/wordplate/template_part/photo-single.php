<body id="single-photo-page">
    <header class="header">
        <?php
        // Inclusion de l'en-tête du site
        get_header();

        // Inclusion d'une partie de modèle pour le formulaire de contact
        get_template_part('template_part/contact-modale');
        ?>
    </header>
    <?php
    // Définition d'un tableau associatif pour les catégories d'images
    $categories = [
        "0.webp" => "Réception",
        "1.webp" => "Réception",
        "2.webp" => "Télévision",
        "3.webp" => "Concert",
        "4.webp" => "Concert",
        "5.webp" => "Mariage",
        "6.webp" => "Mariage",
        "7.webp" => "Mariage",
        "8.webp" => "Concert",
        "9.webp" => "Mariage",
        "10.webp" => "Mariage",
        "11.webp" => "Mariage",
        "12.webp" => "Mariage",
        "13.webp" => "Mariage",
        "14.webp" => "Concert",
        "15.webp" => "Mariage"
    ];

    // Récupération des métadonnées de l'image
    $reference = get_post_meta(get_the_ID(), 'reference', true);
    $annee = get_post_meta(get_the_ID(), 'reference', true);
    $format = get_post_meta(get_the_ID(), 'format', true);
    $type = get_post_meta(get_the_ID(), 'type', true);
    $fichier = get_post_meta(get_the_ID(), 'fichier', true);

    // Modification du chemin du fichier image
    $fichier = str_replace('/inc/images', 'themes/wordplate/inc/images', $fichier);
    ?>
    <div id="app">
        <div class="index">
        </div>
        <article class="frame">
            <div class="flex">
                <?php
                $query = "SELECT * FROM mytable LIMIT 20";
                $data = $wpdb->get_results($query, ARRAY_A);

                foreach ($data as $index => $item) {
                    if (get_the_title() === $item['Titre']) {
                        echo '<h1 class="team-mari-e">' . esc_attr($item['Titre']) . '</h1>';
                    }
                }
                ?>
                <p class="text-wrapper">RÉFÉRENCE: <?php echo esc_html($reference); ?></p>
                <p class="text-wrapper">CATÉGORIE: <?php echo isset($categories[basename($fichier)]) ? $categories[basename($fichier)] : 'Catégorie inconnue'; ?></p>
                <p class="text-wrapper">FORMAT: <?php echo esc_html($format); ?></p>
                <p class="text-wrapper">TYPE: <?php echo esc_html($type); ?></p>
                <p class="text-wrapper">ANNÉE: <?php echo esc_html($annee); ?></p>
                <em class="line text-wrapper"></em>
            </div>
            <div class="image-wrapper">
                <?php $imageUrl = wp_get_attachment_url($fichier); ?>
                <img src="<?php echo esc_html($fichier); ?>" class="nathalie-jpeg">
            </div>
        </article>
        <div>
            <?php
            echo '<article id="flex-cont">';
            echo '<div id="flex-cont1">';
            echo '<p class="div">Cette photo vous intéresse ?</p>';
            echo '<div id="contact" class="charger-plus" data-ref-photo="' . esc_attr($reference) . '">Contact</div>';
            echo '</div>';
            echo '<div class="gallery-wrapper">';
            echo '<div class="galler galler-item" id="gallery-1">';
            $slug = get_query_var('photo');
            $photo_url = home_url("/?photo=$slug");

            echo '</a>';


            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => -1,
            );
           
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    // Récupérez les pièces jointes de la publication
                    $attachments = get_posts(array(
                        'post_type' => 'attachment',
                        'post_parent' => get_post_meta('fichier'),
                        
                    ));

                    if ($attachments) {
                        foreach ($attachments as $attachment) {
                            
                            echo '<a href="' . $photo_url . '">' . wp_get_attachment_image(esc_html($attachment->ID, 'thumbnail')) . '</a>';
                        }
                    }
                }
                wp_reset_postdata();
                
            } else {
                // Aucune publication trouvée
                echo 'Aucune publication trouvée.';
            }



            echo '</div>';
            echo ' <div class="arrow-container">';

            echo '<a class="prev fa fa-arrow-left" ></a>';
            echo '<a class="next fa fa-arrow-right" ></a>';
            echo '</div>';
            echo '</div>';
            echo '</article>';
            ?>
        </div>
    </div>
    <span class="line2 text-wrapper"></span>
    <picture id="flex-cont2">
        <h3 class="vous-aimerez-AUSSI">VOUS AIMEREZ AUSSI</h3>
        <?php
        // Récupération de la catégorie de la page individuelle
        $category = $categories[basename($fichier)];

        // Récupération de 2 images de la même catégorie
        $query = "SELECT * FROM mytable WHERE Catégorie = '$category' LIMIT 2";
        $data = $wpdb->get_results($query, ARRAY_A);
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
        // Affichage des images
        if ($data) {
            echo '<div class="images-container">';
            foreach ($data as $index => $item) {
                if ($index < 2) {
                    echo '<div id="">';
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
                    echo '<a class="image-link" href="' . esc_url(get_theme_file_uri($item['Fichier'])) . '" data-fancybox="images" data-caption="<a href=' . esc_url($url) . '><i class=\'eye\' aria-hidden=\'true\' data-toggle=\'details\' data-index=\'' . $index . '\'></i></a><p>' . $item['Catégorie'] . '</p><a href=' . esc_url($custom_post_permalink) . '>' . $item['Référence'] . '</a>">';
                    echo '<img  src="' . esc_url(get_theme_file_uri($item['Fichier'])) . '" alt="' . esc_attr($item['Titre']) . '" data-src="' . esc_url(get_theme_file_uri($item['Fichier'])) . '">';

                    echo '</a>';
                    echo '</div>';
                }
            }
            echo '</div>';
        } else {
            echo 'Aucune image ne correspond aux filtres sélectionnés.';
        }
        ?>
        <a href="http://localhost:8000/#images-1" class="CTA-2" id="myLink" target="_self">Toutes les photos</a>
        </div>
        </div>
    </picture>
    </section>
    <?php get_footer(); ?>
</body>

</html>