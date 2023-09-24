
<section id ="content">
    <?php
global $wpdb;
$query = $query = "SELECT * FROM mytable";

$data = $wpdb->get_results($query, ARRAY_A);
//var_dump($data);
if ($data) {
    $categories = array_unique(array_column($data, 'Catégorie'));
    $formats = array_unique(array_column($data, 'Format'));
    $années = array_unique(array_column($data, 'Année'));
    // In your theme's functions.php or a custom file (e.g., custom-config.php)
class MyCustomConfig {
    public static function getPDO() {
        // Your custom PDO configuration here
        $pdo = new PDO('mysql:host=localhost;dbname=mott', 'khar', 'nbvcxw');
        return $pdo;
    }
}

    require "../vendor/autoload.php";
    try {
        $pdo = MyCustomConfig::getPDO();
        $images = $pdo->query("SELECT Fichier, Titre, Référence, Catégorie, Année, Format, Type, custom_css FROM mytable");

    
       
    
    } catch (PDOException $e) {
        echo "PDO Exception: " . $e->getMessage();
    }
    

    echo '<div id="flex">';
echo ' <div class="custom-dropdown">';
echo '<select class="options" id="categorie" name="Catégorie">';
//echo '<span class="">Catégorie</span>';
echo '<option class="selected" value="Catégorie">Catégorie</option>';
foreach ($categories as $categorie) {
    echo '<option value="' . esc_html($categorie) . '">' . esc_html($categorie) . '</option>';
}
echo '</select>';
echo '</div>';
echo ' <div class="custom-dropdown">';
echo '<select class="options" id="format" name="Format">';
//echo '<span class="">Format</span>';
echo '<option value="Format" class="selected" value="Format">Format</option>';
foreach ($formats as $format) {
    echo '<option value="' . esc_html($format) . '">' . esc_html($format) . '</option>';
}
echo '</select>';
echo '</div>';
echo ' <div class="custom-dropdown">';
echo '<select class="options" id="annee" name="Année">';
//echo '<span class="">Année</span>';
echo '<option value="Année">Année</option>';
foreach ($années as $année) {
    echo '<option value="' . esc_html($année) . '">' . esc_html($année) . '</option>';
}
echo '</select>';
echo '</div>';
echo '</div>';
} else {
    die('Erreur lors du chargement des données.');
}

?>
</section>