<?php
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

        // Commencez la section HTML ici
        ?>
        <!DOCTYPE html>
        <html>
        <body>
            <div class="desktop-single-photo">
                <!-- Le reste de votre HTML -->
                <div class="frame">
                    <div style=" position: relative;
  width: 420px;
  margin-top: -1px;
  font-family: var(--h2-desktop-font-family);
  font-weight: var(--h2-desktop-font-weight);
  font-style: var(--h2-desktop-font-style);
  color: #000000;
  font-size: var(--h2-desktop-font-size);
  letter-spacing: var(--h2-desktop-letter-spacing);
  line-height: var(--h2-desktop-line-height);">TEAM MARIÉE</div>
                    <div class="text-wrapper">RÉFÉRENCE : <?php echo esc_html($reference); ?></div>
                    <div class="text-wrapper">CATÉGORIE : <?php echo esc_html($type); ?></div>
                    <div class="text-wrapper">FORMAT : <?php echo esc_html($format); ?></div>
                    <div class="text-wrapper">TYPE : <?php echo esc_html($type); ?></div>
                    <div class="text-wrapper">ANNÉE : <?php echo esc_html($annee); ?></div>
                </div>
                <!-- Le reste de votre HTML -->
            </div>
        </body>
        </html>
        <?php
        // Fin de la section HTML
        endwhile;

else :
    echo 'Aucune photo trouvée avec le titre "' . esc_html($photo_title) . '".';
endif;
?>
