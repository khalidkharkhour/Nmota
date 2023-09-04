<?php
/* Template Name: Page de Photos */

get_header(); // Inclure l'en-tête WordPress
?>

<main id="main" class="site-main">
    <?php
    
    // Récupérez les données passées depuis single.php
    global $custom_data;

    if ($custom_data) :
        foreach ($custom_data as $row) :
            $reference = isset($row['reference']) ? $row['reference'] : '';
            $annee = isset($row['annee']) ? $row['annee'] : '';
            $format = isset($row['format']) ? $row['format'] : '';
            $type = isset($row['type']) ? $row['type'] : '';
            $fichier = isset($row['fichier']) ? $row['fichier'] : '';
            ?>

            <div id="sin">
                <!-- Votre contenu ici -->
                <div class="frame">
                    <div class="team-mari-e">TEAM MARIÉE</div>
                    <div class="text-wrapper">RÉFÉRENCE : <?php echo esc_html($reference); ?></div>
                    <div class="text-wrapper">CATÉGORIE : MARIAGE</div>
                    <div class="text-wrapper">FORMAT : <?php echo esc_html($format); ?></div>
                    <div class="text-wrapper">TYPE : <?php echo esc_html($type); ?></div>
                    <div class="text-wrapper">ANNÉE : <?php echo esc_html($annee); ?></div>
                </div>
                <!-- Autres éléments du contenu -->
            </div>

    <?php
        endforeach;
    else :
        echo 'Aucune photo trouvée.';
    endif;
    ?>
</main><!-- #main -->

<?php
get_footer(); // Inclure le pied de page WordPress
?>
