<div id="primary" class="content-area container">
    <main id="main" class="site-main full-width" role="main">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
                get_template_part('template-parts/content', 'sin');

                the_post_navigation();

                // Si les commentaires sont ouverts ou s'il y a au moins un commentaire, chargez le modèle de commentaire.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // Fin de la boucle.
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->
