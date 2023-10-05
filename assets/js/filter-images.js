(function ($) {
    $(document).ready(function () {
        const container = $('#image-grid');
        const loadMoreButton = $('#load-more');
        const returnButton = $('#return-button');
        const itemsPerPage = 12; // Nombre d'images à afficher initialement
        let currentIndex = 0;

        // Fonction pour afficher les images à partir de l'index donné
        function showImages(startIndex, endIndex) {
            container.find('.image-item').each(function (index) {
                if (index >= startIndex && index < endIndex) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Affiche les 12 premières images
        showImages(0, itemsPerPage);

        loadMoreButton.on('click', function (e) {
            e.preventDefault();
            // Incrémente l'index de départ
            currentIndex += itemsPerPage;
            // Affiche les images suivantes
            showImages(currentIndex, currentIndex + itemsPerPage);

            // Cache le bouton "Charger plus" si toutes les images ont été chargées
            const imageItems = container.find('.image-item');
            if (currentIndex + itemsPerPage >= imageItems.length) {
                loadMoreButton.hide();
            }

            // Affiche le bouton "Retour"
            returnButton.show();
        });

        returnButton.on('click', function (e) {
            e.preventDefault();
            // Cache le bouton "Retour"
            returnButton.hide();
            // Réinitialise l'index
            currentIndex = 0;
            // Cache toutes les images
            container.find('.image-item').hide();
            // Affiche les 12 premières images
            showImages(0, itemsPerPage);
            // Affiche le bouton "Charger plus"
            loadMoreButton.show();
        });
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
