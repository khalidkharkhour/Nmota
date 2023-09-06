<?php

// Utilisez la fonction get_posts pour récupérer des publications
$posts = get_posts();

foreach ($posts as $post) {
    // Obtenez le titre de la publication
    $post_title = $post->post_title;
    
    
    // Affichez le lien
    echo "<a href='$url'>$post_title</a><br>";
}

?>

