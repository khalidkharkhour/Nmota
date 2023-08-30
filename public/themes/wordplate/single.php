<?php

$element_id = get_the_ID();

if (isset($_GET['image_id'])) {
    $image_index = intval($_GET['image_id']);

    if ($image_index >= 0 && $image_index < count($data)) {
        $image = $data[$image_index];

        echo '<div class="frame">';
        echo '<div class="team-mari-e">TEAM MARIÉE</div>';
        echo '<div class="text-wrapper">RÉFÉRENCE : ' . $image['Référence'] . '</div>';
        echo '<div class="text-wrapper">CATÉGORIE : ' . $image['Catégorie'] . '</div>';
        echo '<div class="text-wrapper">FORMAT : ' . $image['Format'] . '</div>';
        echo '<div class="text-wrapper">TYPE : ' . $image['Type'] . '</div>';
        echo '<div class="text-wrapper">ANNÉE : ' . $image['Année'] . '</div>';
        
        // Ajoutez un bouton qui déclenche l'affichage des détails
        echo '<i class="fa fa-eye" aria-hidden="true" data-toggle="details" data-element-id="' . $element_id . '"></i>';
        
        echo '</div>';
    } else {
        echo 'Image not found.';
    }
}
