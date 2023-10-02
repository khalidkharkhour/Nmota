/*jQuery(document).ready(($) => {
    // Fonction de mise à jour des photos filtrées
    const updateFilteredPhotos = () => {
        const categorie = $('#categorie').val();
        const format = $('#format').val();
        const annee = $('#annee').val();

        // Effectuez une requête AJAX pour récupérer les photos filtrées
        $.ajax({
            url: ajaxurl, // Assurez-vous que ajaxurl est correctement défini par WordPress
            type: 'POST',
            data: {
                action: 'filter_photos', // Action WordPress personnalisée
                categorie: categorie,
                format: format,
                annee: annee
            },
            success: (response) => {
                $('#image-grid').html(response); // Mettez à jour le contenu de la zone d'affichage des photos
            },
            error: (xhr, status, error) => {
                console.error(error); // Gérez les erreurs
            }
        });
    }

    // Gérez les changements de sélection dans les sélecteurs
    $('#categorie, #format, #annee').change(() => {
        updateFilteredPhotos();
    });

    // Initialisez les photos au chargement de la page
    updateFilteredPhotos();
});*/
$(function () {
    // Fonction de mise à jour des photos filtrées
    const updateFilteredPhotos = () => {
        const selectedCategorie = $('#categorie').val();
        const selectedFormat = $('#format').val();
        const selectedAnnee = $('#annee').val();
        const selectedTri = $('#tri').val();

        // Effectuez une requête AJAX pour récupérer les photos filtrées
        $.ajax({
            url: ajaxurl, // Assurez-vous que ajaxurl est correctement défini par WordPress
            type: 'POST',
            data: {
                action: 'filter_photos', // Action WordPress personnalisée
                categorie: selectedCategorie,
                format: selectedFormat,
                annee: selectedAnnee,
                tri: selectedTri
            },
            success: (response) => {
                $('#image-grid').html(response); // Mettez à jour le contenu de la zone d'affichage des photos
            },
            error: (xhr, status, error) => {
                console.error(error); // Gérez les erreurs
            }
        });
    }

    // Écoutez les changements dans les champs de sélection
    $('#categorie, #format, #annee, #tri').change(() => {
        updateFilteredPhotos();
    });

    // Initialisez les photos au chargement de la page
    updateFilteredPhotos();
});
