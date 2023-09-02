<?php
/* Fichier content-page.php */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="page-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
</div>
