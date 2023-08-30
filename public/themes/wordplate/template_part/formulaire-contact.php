<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $ref = $_POST["ref"];
    
    // Validation rapide (à améliorer selon vos besoins)
    if (empty($nom) || empty($email) || empty($message)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        $destinataire = "votre@email.com";
        $sujet = "Nouveau message depuis le formulaire de contact";
        
        // Format de l'email (exemple: user@domain.com)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "L'adresse email n'est pas valide.";
            exit; // Arrêter le script si l'email n'est pas valide
        }
        
        // Format du texte du message (au moins 10 caractères)
        if (strlen($message) < 10) {
            echo "Le texte du message doit comporter au moins 10 caractères.";
            exit; // Arrêter le script si le message est trop court
        }
        
        $contenu = "Nom: $nom\nEmail: $email\nMessage: $message\nRéférence photo: $ref";
        $entetes = "From: $email\r\nReply-To: $email\r\n";
        
        // Format de la référence photo (bfXXXX)
        if (!empty($ref)) {
            if (!preg_match("/^bf\d{4}$/", $ref)) {
                echo "Le format de la référence photo n'est pas valide (ex. bf1234).";
                exit; // Arrêter le script si la référence n'est pas valide
            }
        }
        
        if (mail($destinataire, $sujet, $contenu, $entetes)) {
            echo "Message envoyé avec succès. Merci de nous avoir contactés!";
        } else {
            echo "Une erreur est survenue lors de l'envoi du message.";
        }
    }
}
?>
