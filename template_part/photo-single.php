<body id="single-photo-page">
    <header class="header">
        <?php
        // Inclusion de l'en-tête du site
        get_header();

        // Inclusion d'une partie de modèle pour le formulaire de contact
        get_template_part('template_part/contact-modale');
        ?>
    </header>
    <?php
    // Récupération des métadonnées de l'image avec ACF
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
    // Vérifier si une image est définie
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
                 
                </article>
            </div>
        </div>
    <?php } else {
        // Aucune image définie
        echo 'Aucune image n\'est définie.';
    }
    ?>
    <span class="line2 text-wrapper"></span>
    <picture id="flex-cont2">
        <h3 class="vous-aimerez-AUSSI">VOUS AIMEREZ AUSSI</h3>
       
    </picture>
    <?php get_footer(); ?>
</body>
</html>
etjxcufykcvitullllllvio