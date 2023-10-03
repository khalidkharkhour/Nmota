
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('image-grid');
    const loadMoreButton = document.getElementById('load-more');
    const returnButton = document.getElementById('return-button');
    const itemsPerPage = 12; // Nombre d'images à afficher initialement
    let currentIndex = 0;

    // Fonction pour afficher les images à partir de l'index donné
    function showImages(startIndex, endIndex) {
        const imageItems = container.querySelectorAll('.image-item');
        for (let i = startIndex; i < endIndex; i++) {
            if (imageItems[i]) {
                imageItems[i].style.display = 'block';
            }
        }
    }

    // Affiche les 12 premières images
    showImages(0, itemsPerPage);

    loadMoreButton.addEventListener('click', () => {
        // Incrémente l'index de départ
        currentIndex += itemsPerPage;
        // Affiche les images suivantes
        showImages(currentIndex, currentIndex + itemsPerPage);

        // Cache le bouton "Charger plus" si toutes les images ont été chargées
        const imageItems = container.querySelectorAll('.image-item');
        if (currentIndex + itemsPerPage >= imageItems.length) {
            loadMoreButton.style.display = 'none';
        }

        // Affiche le bouton "Retour"
        returnButton.style.display = 'block';
    });

    returnButton.addEventListener('click', () => {
        // Cache le bouton "Retour"
        returnButton.style.display = 'none';
        // Réinitialise l'index
        currentIndex = 0;
        // Cache toutes les images
        const imageItems = container.querySelectorAll('.image-item');
        for (let i = 0; i < imageItems.length; i++) {
            imageItems[i].style.display = 'none';
        }
        // Affiche les 12 premières images
        showImages(0, itemsPerPage);
        // Affiche le bouton "Charger plus"
        loadMoreButton.style.display = 'block';
    });
});

    // Fonction pour filtrer les images en fonction des sélecteurs
    function filterImages() {
        var selectedCategory = document.getElementById("categorie").value;
        var selectedFormat = document.getElementById("format").value;
        var selectedYear = document.getElementById("annee").value;

        var imageItems = document.querySelectorAll('.image-item');

        imageItems.forEach(function (item) {
            var itemCategory = item.getAttribute("data-category");
            var itemFormat = item.getAttribute("data-format");
            var itemYear = item.getAttribute("data-year");

            if (
                (selectedCategory === 'Toutes' || selectedCategory === itemCategory) &&
                (selectedFormat === 'Tous' || selectedFormat === itemFormat) &&
                (selectedYear === 'Toutes' || selectedYear === itemYear)
            ) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Écoutez les changements dans les sélecteurs et filtrez les images en conséquence
    document.getElementById("categorie").addEventListener('change', filterImages);
    document.getElementById("format").addEventListener('change', filterImages);
    document.getElementById("annee").addEventListener('change', filterImages);


