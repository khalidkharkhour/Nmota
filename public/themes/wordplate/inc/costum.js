(function () {
    // Variables locales pour éviter les conflits
    let currentImageIndex = 0;
    const images = document.querySelectorAll('#gallery-1 img');
    const galleryContainer = document.querySelector('#gallery-1');

    // Fonction pour afficher l'image actuelle
    function showCurrentImage() {
        // Masquer toutes les images
        images.forEach(image => {
            image.style.display = 'none';
        });

        // Afficher l'image actuelle
        images[currentImageIndex].style.display = 'block';
    }

    // Appeler la fonction pour afficher la première image
    showCurrentImage();

    // Gestion des boutons de défilement précédent et suivant
    document.querySelector('.prev').addEventListener('click', () => {
        currentImageIndex--;
        if (currentImageIndex < 0) {
            currentImageIndex = images.length - 1;
        }
        showCurrentImage();
    });

    document.querySelector('.next').addEventListener('click', () => {
        currentImageIndex++;
        if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        }
        showCurrentImage();
    });

    // Redirection vers "localhost:8000/#images-1" lors du clic sur une image
    galleryContainer.addEventListener('click', () => {
        window.location.href = 'localhost:8000/#images-1';
    });
})();

document.addEventListener("DOMContentLoaded", function () {
    const menuItem = document.getElementById("contact");
    const modal = document.getElementById("myModal");
    const modalContent = modal.querySelector(".modal-content");
    const refPhotoInput = document.getElementById("ref-photo-input"); // Champ Réf. Photo dans le formulaire

    menuItem.addEventListener("click", function (event) {
        event.preventDefault();

        // Récupérez la valeur de l'attribut data-ref-photo du bouton
        const reference = menuItem.getAttribute("data-ref-photo");

        // Préremplissez le champ du formulaire avec la valeur de data-ref-photo
        refPhotoInput.value = reference;

        modal.classList.add("show");
        modal.style.display = "block";
    });

    
});

