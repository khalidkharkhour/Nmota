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

const largeurFenetre = window.innerWidth;
const hauteurFenetre = window.innerHeight;

console.log("Largeur de la fenêtre : " + largeurFenetre + "px");
console.log("Hauteur de la fenêtre : " + hauteurFenetre + "px");

const categories = [
    "0.webp",
    "1.webp",
    "2.webp",
    "3.webp",
    "4.webp",
    "5.webp",
    "6.webp",
    "7.webp",
    "8.webp",
    "9.webp",
    "10.webp",
    "11.webp",
    "12.webp",
    "13.webp",
    "14.webp",
    "15.webp"
];

// Function to generate and add CSS rules dynamically
function addCssRules() {
    const head = document.head || document.getElementsByTagName('head')[0];
    const style = document.createElement('style');
    style.type = 'text/css';

    let css = '';
    categories.forEach((image, index) => {
        css += `
            .card-photo.card-photo-${index} {
                background-image: url("/themes/wordplate/inc/images/${image}");
                background-position: 50% 50%;
                background-size: cover;
                width: 32rem;
                height: 31rem;
                object-fit: contain;
            }
        `;
    });

    style.appendChild(document.createTextNode(css));
    head.appendChild(style);
}

// Call the function to add CSS rules when the document is ready
document.addEventListener('DOMContentLoaded', addCssRules);

