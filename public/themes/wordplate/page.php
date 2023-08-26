<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Validation rapide (à améliorer selon vos besoins)
    if (empty($nom) || empty($email) || empty($message)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        $destinataire = "votre@email.com"; // Adresse email où vous recevrez les messages
        $sujet = "Nouveau message depuis le formulaire de contact";
        $contenu = "Nom: $nom\nEmail: $email\nMessage: $message";
        $entetes = "From: $email\r\nReply-To: $email\r\n";
        
        if (mail($destinataire, $sujet, $contenu, $entetes)) {
            echo "Message envoyé avec succès. Merci de nous avoir contactés!";
        } else {
            echo "Une erreur est survenue lors de l'envoi du message.";
        }
    }
}





get_template_part('template_part/contact', 'modale');
get_header(); ?>




<?php get_footer(); ?>
