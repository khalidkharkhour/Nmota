

<body id="single-photo-page">
    <header class="header">
        <?php
        get_header();
        get_template_part('template_part/contact-modale');
        ?>
    </header>
    <?php
    $categories = [
        "0.webp" => "Réception",
        "1.webp" => "Réception ",
        "2.webp" => "Télévision",
        "3.webp" => "Concert",
        "4.webp" =>  "Concert",
        "5.webp" =>   "Mariage",
        "6.webp" => "Mariage",
        "7.webp" => "Mariage",
        "8.webp" => "Concert",
        "9.webp" => "Mariage",
        "10.webp" => "Mariage",
        "11.webp" => "Mariage",
        "12.webp" => "Mariage",
        "13.webp" => "Mariage",
        "14.webp" => "Concert",
        "15.webp" =>  "Mariage"
    ];


    $reference = get_post_meta(get_the_ID(), 'reference', true);
    $annee = get_post_meta(get_the_ID(), 'annee', true);
    $format = get_post_meta(get_the_ID(), 'format', true);
    $type = get_post_meta(get_the_ID(), 'type', true);
    $fichier = get_post_meta(get_the_ID(), 'fichier', true);
    $fichier = str_replace('/inc/images', 'themes/wordplate/inc/images', $fichier);
    ?>
    <div id="app">
        <div class="index">
        </div>
        <article class="frame">
            <div class="flex">
                <h1 class="team-mari-e">TEAM MARIÉE</h1>
                <p class="text-wrapper">RÉFÉRENCE :<?php echo esc_html($reference); ?></p>
                <p class="text-wrapper">CATÉGORIE : <?php echo isset($categories[basename($fichier)]) ? $categories[basename($fichier)] : 'Catégorie inconnue'; ?></p>
                <p class="text-wrapper">FORMAT :<?php echo esc_html($format); ?></p>
                <p class="text-wrapper">TYPE :<?php echo esc_html($type); ?></p>
                <p class="text-wrapper">ANNÉE :<?php echo esc_html($annee); ?></p>
                <em class="line text-wrapper"></em>
            </div>
            <div class="image-wrapper">
            <?php $imageUrl = wp_get_attachment_url($fichier);?>
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
            echo do_shortcode('[gallery ids="41778,41777,41776,41775,41774,41769,41771,41773"][gallery ids="41762,41761"]');
            echo '</div>';
              echo ' <div class="arrow-container">';
            echo '<span class="prev fa fa-arrow-left"></span>';
            echo '<span class="next fa fa-arrow-right"></span>';
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
// Get the category of the single page
$categories = [
    "0.webp" => "Réception",
    "1.webp" => "Réception ",
    "2.webp" => "Télévision",
    "3.webp" => "Concert",
    "4.webp" =>  "Concert",
    "5.webp" =>   "Mariage",
    "6.webp" => "Mariage",
    "7.webp" => "Mariage",
    "8.webp" => "Concert",
    "9.webp" => "Mariage",
    "10.webp" => "Mariage",
    "11.webp" => "Mariage",
    "12.webp" => "Mariage",
    "13.webp" => "Mariage",
    "14.webp" => "Concert",
    "15.webp" =>  "Mariage"
];


$reference = get_post_meta(get_the_ID(), 'reference', true);
$annee = get_post_meta(get_the_ID(), 'annee', true);
$format = get_post_meta(get_the_ID(), 'format', true);
$type = get_post_meta(get_the_ID(), 'type', true);
$fichier = get_post_meta(get_the_ID(), 'fichier', true);
$fichier = str_replace('/inc/images', 'themes/wordplate/inc/images', $fichier);

$category = $categories[basename($fichier)];

// Get 2 images from the same category
$query = "SELECT * FROM mytable WHERE Catégorie = '$category' LIMIT 2";
$data = $wpdb->get_results($query, ARRAY_A);

// Display the images
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
    echo 'No images match the selected filters.';
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