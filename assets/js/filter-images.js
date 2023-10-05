jQuery(document).ready(function () {
    const container = jQuery('#image-grid');
    const loadMoreButton = jQuery('#load-more');
    const returnButton = jQuery('#return-button');
    const itemsPerPage = 12; // Nombre d'images à afficher initialement
    let currentIndex = 0;
    jQuery('#load-more').on('click', function (e) {
        e.preventDefault();
    
        // Réinitialise l'index de départ
        currentIndex = 0;
    
        // Affiche les 12 prochaines images
        loadImages();
    
        // Fait défiler la page jusqu'en bas
        jQuery('html, body').animate({
            scrollTop: jQuery(document).height()
        }, 1000);
    });
    
    // Fonction pour afficher les images à partir de l'index donné
    function showImages(startIndex, endIndex) {
        container.find('.image-item').each(function (index) {
            if (index >= startIndex && index < endIndex) {
                jQuery(this).show();
            } else {
                jQuery(this).hide();
            }
        });
    }

    // Fonction pour charger les images via AJAX
    function loadImages() {
        const ajaxurl = custom_script_vars.ajaxurl;
        const postid = jQuery('input[name=postid]').val();
        const nonce = jQuery('input[name=nonce]').val();
        const data = {
            action: 'load_gallery_images',
            postid: postid,
            nonce: nonce
        };

        fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: new URLSearchParams(data),
        })
            .then(response => response.json())
            .then(body => {
                console.log(body);

                // En cas d'erreur
                if (!body.success) {
                    alert(body.data);
                    return;
                }

                // Incrémente l'index de départ
                currentIndex += itemsPerPage;

                // Affiche les 12 prochaines images
                showImages(currentIndex, currentIndex + itemsPerPage);

                // Cache le bouton "Charger plus" si toutes les images ont été chargées
                if (currentIndex >= body.images.length) {
                    loadMoreButton.hide();
                    returnButton.show();
                }
            });
    }

    // Gestionnaire d'événements pour le bouton "Retour"
    jQuery('#return-button').on('click', function (e) {
        e.preventDefault();
        jQuery(this).hide(); // Masque le bouton "Retour"
        currentIndex = 0;
        showImages(0, itemsPerPage); // Affiche les premières images
        loadMoreButton.show(); // Montre à nouveau le bouton "Charger plus"
    });

    // Affiche le bouton "Charger plus" initialement
    loadMoreButton.show();
    returnButton.hide();

    // Appelez loadImages au chargement de la page (pour afficher les premières images)
    loadImages();
});

(function ($) {
    $(document).ready(function () {
        // Initialisation de Select2 pour les sélecteurs
        $("#annee").select2();
        $("#categorie").select2();
        $("#format").select2();

        const container = $('#image-grid');
        const categoriesSelect = $('#categorie');
        const formatsSelect = $('#format');

        // Fonction pour filtrer les images en fonction de la catégorie et du format sélectionnés
        function filterImages() {
            const selectedCategory = categoriesSelect.val();
            const selectedFormat = formatsSelect.val();

            container.find('.image-item').each(function () {
                const image = $(this);
                const category = image.data('category');
                const format = image.data('format');

                // Affiche l'image si la catégorie est "Toutes" ou correspond à la catégorie sélectionnée
                // et si le format est "Tous" ou correspond au format sélectionné
                if ((selectedCategory === 'Toutes' || category === selectedCategory) &&
                    (selectedFormat === 'Tous' || format === selectedFormat)) {
                    image.show();
                } else {
                    image.hide();
                }
            });
        }

        // Écouteurs d'événements pour les sélecteurs de catégorie et de format
        categoriesSelect.on('change', filterImages);
        formatsSelect.on('change', filterImages);
    });
})(jQuery);

(function ($) {
    $(document).ready(function () {
        // Initialisation de Select2 pour les sélecteurs
        $("#annee").select2();
        $("#categorie").select2();
        $("#format").select2();

        const container = $('#image-grid');
        const categoriesSelect = $('#categorie');
        const formatsSelect = $('#format');

        // Fonction pour filtrer les images en fonction de la catégorie et du format sélectionnés
        function filterImages() {
            const selectedCategory = categoriesSelect.val();
            const selectedFormat = formatsSelect.val();

            container.find('.image-item').each(function () {
                const image = $(this);
                const category = image.data('category');
                const format = image.data('format');

                // Affiche l'image si la catégorie est "Toutes" ou correspond à la catégorie sélectionnée
                // et si le format est "Tous" ou correspond au format sélectionné
                if ((selectedCategory === 'Toutes' || category === selectedCategory) &&
                    (selectedFormat === 'Tous' || format === selectedFormat)) {
                    image.show();
                } else {
                    image.hide();
                }
            });
        }

        // Écouteurs d'événements pour les sélecteurs de catégorie et de format
        categoriesSelect.on('change', filterImages);
        formatsSelect.on('change', filterImages);
    });
})(jQuery);
