<?php
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

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $ref_photo = $_POST["generated_ref"];
        $message = $_POST["message"];
        $destinataire = "kharkhour@hotmail.fr";
        $sujet = "Nouveau message depuis le formulaire de contact";
        $message_email = "Nom: $name\n";
        $message_email .= "E-mail: $email\n";
        $message_email .= "Réf photo: $ref_photo\n";
        $message_email .= "Message:\n$message\n";

        // Envoie l'e-mail
        if (mail($destinataire, $sujet, $message_email)) {
            echo "Le formulaire a été soumis avec succès !";
        } else {
            echo "Erreur lors de l'envoi de l'e-mail.";
        }

        // Redirige après l'envoi du formulaire
        header("Location: http://localhost:10038/");
        exit;
    }
}
?>
