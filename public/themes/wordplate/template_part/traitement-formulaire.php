
<?php
global $wpdb;



$query = "SELECT * FROM mytable LIMIT 20";
$data = $wpdb->get_results($query, ARRAY_A);

$categories = array_unique(array_column($data, 'Catégorie'));
$formats = array_unique(array_column($data, 'Format'));
$années = array_unique(array_column($data, 'Année'));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $ref_photo = $_POST["generated_ref"];
    $message = $_POST["message"];

    // Vous pouvez maintenant traiter les données, par exemple, envoyer un e-mail ou enregistrer dans une base de données.

    // Exemple d'envoi d'un e-mail de démonstration
    $destinataire = "votre_email@example.com"; // Remplacez par votre adresse e-mail
    $sujet = "Nouveau message depuis le formulaire de contact";
    $message_email = "Nom: $name\n";
    $message_email .= "E-mail: $email\n";
    $message_email .= "Réf photo: $ref_photo\n";
    $message_email .= "Message:\n$message\n";


    // Utilisez la fonction mail() pour envoyer l'e-mail
    mail($destinataire, $sujet, $message_email);

    // Redirigez l'utilisateur vers une page de confirmation
    header("Location:/themes/worpalte/page.php");

    exit;
    echo "Le formulaire a été soumis avec succès !";
}
?>
