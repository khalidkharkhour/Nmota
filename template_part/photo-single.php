<?php
/**
 * Template Name: photo-single
 * Description: affiche les posts 
 * @package Nathalie-mota
 * 
 */
?>




<body id="single-photo-page">
    <header class="header">
        <?php
        get_header();
        get_template_part('template_part/contact-modale');
        ?>
    </header>
    <?php

    $titre = get_field('titre');
    $image_url = get_field('image');
    $categories = get_field('categories');
    $reference = get_field('reference');
    $annees = get_field('annees');
    $format = get_field('format');
    $type = get_field('type');
    $categories = get_field('categories');
    if (is_array($categories)) {
        $categories = implode(', ', $categories);
    }
    if (is_array($type)) {
        $type = implode(', ', $type);
    }
    if (is_array($format)) {
        $format = implode(', ',  $format);
    }
    if (is_array($annees)) {
        $annees = implode(', ',   $annees);
    }
    if (is_array($reference)) {
        $reference = implode(', ',  $reference);
    }


    if ($image_url) {
    ?>
        <div id="app">
            <div class="index">
            </div>
            <article class="frame">
                <div class="flex">
                    <h1 class="team-mari-e"><?php echo esc_html($titre); ?></h1>
                    <p class="text-wrapper">RÉFÉRENCE: <?php echo esc_html($reference); ?></p>
                    <p class="text-wrapper">CATÉGORIE: <?php echo esc_html($categories); ?></p>
                    <p class="text-wrapper">FORMAT: <?php echo esc_html($format); ?></p>
                    <p class="text-wrapper">TYPE: <?php echo esc_html($type); ?></p>
                    <p class="text-wrapper">ANNÉE: <?php echo esc_html($annees); ?></p>
                    <em class="line text-wrapper"></em>
                </div>
                <div class="image-wrapper">
                    <img src="<?php echo esc_url($image_url); ?>" class="nathalie-jpeg">
                </div>
            </article>
            <div>
                <article id="flex-cont">
                    <div id="flex-cont1">
                        <p class="div">Cette photo vous intéresse ?</p>
                        <div id="contact" class="charger-plus" data-ref-photo="<?php echo esc_attr($reference); ?>">Contact</div>
                    </div>

                <?php
                echo '<div class="gallery-wrapper">';
                echo '<div class="galler galler-item" id="gallery-1">';

                $args = array(
                    'post_type'      => 'photo',
                    'posts_per_page' => 1,
                );

                $query = new WP_Query($args);
              
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();


                        $post_id = get_the_ID();


                        $attachments = get_posts(array(
                            'post_type'      => 'attachment',
                            'post_parent'    => $post_id,
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        ));

                        if ($attachments) {
                            foreach ($attachments as $index => $attachment) {

                                $image_url = wp_get_attachment_url($attachment->ID);
                                $thumbnail_url = wp_get_attachment_image_src($attachment->ID, 'thumbnail')[0];
                                $full_url = wp_get_attachment_image_src($attachment->ID, 'full')[0];

                                echo '<a href="' . esc_url($full_url) . '"><img src="' . esc_url($thumbnail_url) . '" alt="Image ' . $index . '" data-index="' . $index . '"></a>';
                            }
                        }
                    }
                    wp_reset_postdata();

                    echo '</div>';
                    echo '</div>';


                    echo '</div>';
                    echo ' <div class="arrow-container">';


                    echo '<span  class="prev fa fa-arrow-left"></span>';
                    echo '<span  class="next fa fa-arrow-right"></span>';

                    echo '</div>';
                    echo '</div>';
                }
            } else {
                // Aucune image attachée trouvée
            }



            echo '</article>';
                ?>
            </div>
        </div>


        <span class="line2 text-wrapper"></span>
        <picture id="flex-cont2">
            <h3 class="vous-aimerez-AUSSI">VOUS AIMEREZ AUSSI</h3>


            <?php

            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'post__not_in' => array($post_id),
                'meta_query' => array(
                    array(
                        'key' => 'categories',
                        'value' => $categories,
                        'compare' => 'LIKE',
                    ),
                ),
            );
            $query = new WP_Query($args);
            echo '<div class="images-container ">';
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $photo_id = get_the_ID();
                    $photo_title = get_the_title();
                    $photo_image_url = get_field('image');

                    $post_categories = get_field('categories');
                    if (is_array($categories)) {
                        $categories = implode(', ', $categories);
                    }
                    $post = get_permalink();

                    $titre = get_field('titre');

                    $categories = get_field('categories');
                    if ($categories) {
                        $categorie = implode(', ', $categories);
                    } else {
                        $categorie = '';
                    }
                    echo '<span class="fas fa-expand show-on-hover "></span>';
                    echo '<figcaption>';
                    echo '<a href="' . esc_url($post) . '"><i class="fas fa-eye show-on-hover"></i></a>'; // Lien vers le post actuel
                    echo '<a class="fancybox" data-fancybox="images" href="' . esc_url($photo_image_url) . '" alt="' . esc_attr($photo_title) . '" data-caption="<p>' . esc_html($reference) . ' ' . esc_html($categorie) . '</p>">';
                    echo '<img src="' . esc_url($photo_image_url) . '" alt="' . esc_attr($photo_title) . '">';
                    echo '<span id="flex3">';
                    echo '<p class="prag show-on-hover  ">' . esc_attr($photo_title) . '</p>';
                    echo '<p class="prag show-on-hover  ">' . esc_html($categorie) . '</p>';
                    echo  '</span>';
                    echo '</a>';
                    echo '</figcaption>';
                }
            }
            echo '</div>';
            wp_reset_postdata();

            ?>
            <a href="http://localhost:10038/" class="CTA-2" id="myLink" target="_self">Toutes les photos</a>
            </div>
            </div>
        </picture>
        <?php get_footer(); ?>
</body>

</html>
