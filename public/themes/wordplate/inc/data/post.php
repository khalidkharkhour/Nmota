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
        'taxonomies'         => array('categorie', 'post_tag', 'post_reference', 'post_years', 'format', 'type')
    );

    register_post_type('photo', $args);

    $done = true;
}

register_taxonomy('categorie', 'photo', array(
    'label' => 'Catégorie',
    'rewrite' => array('slug' => 'categorie'),
    'hierarchical' => true,
));


// Enregistrer la taxonomie personnalisée "format"
register_taxonomy('format', 'photo', array(
    'label' => 'Format',
    'rewrite' => array('slug' => 'format'),
    'hierarchical' => true, // Modifiez cela en fonction de vos besoins
));

add_action('init', 'creer_type_post_personnalise');
/*$total_count = 0; // Initialisation du total_count

if (isset($count->publish)) {
    $total_count = $count->publish;
}

// Créer des publications personnalisées pour chaque entrée
$limit = 20;
$count = wp_count_posts('photo');


if ($total_count < $limit) {
    $remaining_limit = $limit - $total_count;
    $result = $wpdb->get_results("SELECT * FROM mytable LIMIT $remaining_limit");

    foreach ($result as $row) {
        $post_data = array(
            'post_title'   => $row->Titre,
            'post_status'  => 'publish',
            'post_type'    => 'photo'
        );

        $post_id = wp_insert_post($post_data);

        // Associer les données à des champs personnalisés
           update_post_meta($post_id, 'categorie', $row->Catégorie);
        update_post_meta($post_id, 'reference', $row->Référence);
        update_post_meta($post_id, 'annee', $row->Année);
        update_post_meta($post_id, 'format', $row->Format);
        update_post_meta($post_id, 'type', $row->Type);
        update_post_meta($post_id, 'fichier', $row->Fichier);
    }
}*/


function register_custom_post_type() {
    // Define the slug of the post type
    $slug = 'custom_post_type';

    // Define the labels of the post type
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

    // Define the arguments of the post type
    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ];

    // Register the post type
    register_post_type($slug, $args);

    // Register custom fields for the post type
    register_post_meta($slug, 'custom_field_1', [
        'type' => 'text', // Change the field type as needed
        'description' => 'Custom Field 1 Description',
        'single' => true, // Set to true if it's a single value, false if it's an array
        'show_in_rest' => true, // This enables the field to be accessible via the REST API
    ]);

    register_post_meta($slug, 'custom_field_2', [
        'type' => 'text',
        'description' => 'Custom Field 2 Description',
        'single' => true,
        'show_in_rest' => true,
    ]);
}

add_action('init', 'register_custom_post_type');
