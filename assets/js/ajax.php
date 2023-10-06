<?php
// Inclure la configuration de la base de données et établir une connexion si nécessaire
// ...

// Exemple de requête SQL pour obtenir les options de catégorie depuis la base de données
$sql_categories = "SELECT DISTINCT category FROM images";
$result_categories = mysqli_query($conn, $sql_categories);

$categories = array();
while ($row = mysqli_fetch_assoc($result_categories)) {
    $categories[] = $row['category'];
}

// Exemple de requête SQL pour obtenir les options de format depuis la base de données
$sql_formats = "SELECT DISTINCT format FROM images";
$result_formats = mysqli_query($conn, $sql_formats);

$formats = array();
while ($row = mysqli_fetch_assoc($result_formats)) {
    $formats[] = $row['format'];
}

// Créer un tableau associatif pour renvoyer les options
$options = array(
    'categories' => $categories,
    'formats' => $formats
);

// Convertir le tableau associatif en JSON et renvoyer la réponse
header('Content-Type: application/json');
echo json_encode($options);
?>
