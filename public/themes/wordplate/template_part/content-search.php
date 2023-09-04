<?php
/* Fichier content-search.php */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="search-title"><?php _e('Résultats de recherche pour :', 'votre-thème'); ?> "<?php echo get_search_query(); ?>"</h2>
    <?php the_content(); ?>
</div>
