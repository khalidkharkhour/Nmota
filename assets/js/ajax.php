<?php

// Exemple de requête SQL pour obtenir les options de catégorie depuis la base de données
/* $sql_categories = "SELECT DISTINCT category FROM images";
$result_categories = mysqli_query($conn, $sql_categories);

$categories = array();
while ($row = mysqli_fetch_assoc($result_categories)) {
    $categories[] = $row['category'];
}

// Exemple de requête SQL pour obtenir les options de format depuis la base de données
/*$sql_formats = "SELECT DISTINCT format FROM images";
$result_formats = mysqli_query($conn, $sql_formats);

$formats = array();
while ($row = mysqli_fetch_assoc($result_formats)) {
    $formats[] = $row['format'];
}

// Exemple de requête SQL pour obtenir les années depuis la base de données
$sql_annees = "SELECT DISTINCT annee FROM images"; // Assurez-vous que le nom de la colonne est correct
$result_annees = mysqli_query($conn, $sql_annees);

$annees = array();
while ($row = mysqli_fetch_assoc($result_annees)) {
    $annees[] = $row['annee'];
}

// Créer un tableau associatif pour renvoyer les options
$options = array(
    'categories' => $categories,
    'formats' => $formats,
    'annees' => $annees // Ajoutez les années récupérées à l'array d'options
);

// Convertir le tableau associatif en JSON et renvoyer la réponse
header('Content-Type: application/json');
echo json_encode($options);
?>
