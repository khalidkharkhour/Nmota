<?php function creer_type_post_personnalise()
{
    static $done = false;

    if ($done) {
        return;
    }

    $labels = array(
        'name'               => 'Photos',
        'singular_name'      => 'Photo',
        'menu_name'          => 'Photos',
        'name_admin_bar'     => 'Photo',
        'add_new'            => 'Ajouter une photo',
        'add_new_item'       => 'Ajouter une nouvelle photo',
        'new_item'           => 'Nouvelle photo',
        'edit_item'          => 'Modifier la photo',
        'view_item'          => 'Voir la photo',
        'all_items'          => 'Toutes les photos',
        'search_items'       => 'Rechercher les photos',
        'parent_item_colon'  => 'Photo parente :',
        'not_found'          => 'Aucune photo trouvée.',
        'not_found_in_trash' => 'Aucune photo trouvée dans la corbeille.',
        'format'           => 'Format',
        'type'             => 'Type',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'photos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies'         => array('category', 'post_tag', 'post_reference', 'post_years', 'format', 'type')
    );

    register_post_type('photo', $args);

    $done = true;
}

// Enregistrer la taxonomie personnalisée "catégorie"
register_taxonomy('catégorie', 'photo', array(
    'label' => 'Catégorie',
    'rewrite' => array('slug' => 'catégorie'),
    'hierarchical' => true, // Modifiez cela en fonction de vos besoins
));

// Enregistrer la taxonomie personnalisée "format"
register_taxonomy('format', 'photo', array(
    'label' => 'Format',
    'rewrite' => array('slug' => 'format'),
    'hierarchical' => true, // Modifiez cela en fonction de vos besoins
));

add_action('init', 'creer_type_post_personnalise');

// Créer des publications personnalisées pour chaque entrée
global $wpdb;
$result = $wpdb->get_results("SELECT * FROM mytable LIMIT 20");

foreach ($result as $row) {
    $post_data = array(
        'post_title'   => $row->Titre,
        'post_status'  => 'publish',
        'post_type'    => 'photo'
    );

    $post_id = wp_insert_post($post_data);

    // Associer les données à des champs personnalisés
    update_post_meta($post_id, 'reference', $row->Référence);
    update_post_meta($post_id, 'annee', $row->Année);
    update_post_meta($post_id, 'format', $row->Format);
    update_post_meta($post_id, 'type', $row->Type);
    update_post_meta($post_id, 'fichier', $row->Fichier);
}
function register_custom_post_type() {

    // Define the slug of the custom post type
    $slug = 'custom_post_type';

    // Define the labels for the custom post type
    $labels = [
        'name' => 'Custom Post Type',
        'singular_name' => 'Custom Post Type Item',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Custom Post Type Item',
        'edit_item' => 'Edit Custom Post Type Item',
        'view_item' => 'View Custom Post Type Item',
        'search_items' => 'Search Custom Post Types',
        'not_found' => 'No Custom Post Types found',
        'not_found_in_trash' => 'No Custom Post Types found in Trash',
    ];

    // Define the arguments for the custom post type
    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'], // Add 'editor' here
    ];

    // Register the custom post type
    register_post_type($slug, $args);
}
add_action('init', 'register_custom_post_type');
function supprimer_publications_excedentaires() {
    if (is_admin()) {
        return;
    }

    $count = wp_count_posts('photo');
    $total_count = $count->publish;
    
    if ($total_count > 20) {
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => -1,
            'fields' => 'ids',
        );
    
        $photos = new WP_Query($args);
    
        if ($photos->have_posts()) {
            $posts_to_delete = array_slice($photos->posts, 20);
    
            foreach ($posts_to_delete as $post_id) {
                if (wp_delete_post($post_id, true)) {
                    // La publication a été supprimée avec succès.
                } else {
                    // Une erreur s'est produite lors de la suppression de la publication.
                }
            }
        }
    }
}
$post_data = array(
    'post_title'   => $row->Titre,
    'post_status'  => 'publish',
    'post_type'    => 'photo'
);

$post_id = wp_insert_post($post_data);

// Associer les données à des champs personnalisés
update_post_meta($post_id, 'reference', $row->Référence);
update_post_meta($post_id, 'annee', $row->Année);
update_post_meta($post_id, 'format', $row->Format);
update_post_meta($post_id, 'type', $row->Type);
update_post_meta($post_id, 'fichier', $row->Fichier);

// Ajoutez les données CSS personnalisées à la colonne "custom_css"
if (!empty($row->custom_css)) {
    global $wpdb;
    $wpdb->update(
        'mytable', // Remplacez par le nom de votre table
        ['custom_css' => $row->custom_css],
        ['ID' => $post_id]
    );
}
