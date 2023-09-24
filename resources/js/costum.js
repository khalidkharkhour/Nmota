import '../js/index.js';
import '../css/style.scss';
//import '../css/fancy.css';
//import '../js/slider.js';
$(function () {
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
})

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

// Fonction pour obtenir la catégorie de la photo courante
function getCategory(photo) {
    return photo.dataset.category;
}

// Fonction pour mélanger un tableau aléatoirement
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

// Mélanger le tableau categories
shuffleArray(categories);

// Fonction pour obtenir les deux premières photos de la catégorie courante
function getTwoPhotos(category) {
    const photos = categories.filter((photo) => photo.category === category);
    return photos.slice(0, 2);
}

// Fonction pour créer un élément <div> pour une photo
function createPhotoDiv(photo) {
    const div = document.createElement('div');
    div.classList.add('card-photo');
    div.classList.add(`card-photo-${categories.indexOf(photo)}`);
    div.style.backgroundImage = `url("/themes/wordplate/inc/images/${photo}")`;
    return div;
}


function showPhotos() {
    console.log("showPhotos() appelée");
    const category = getCategory(document.querySelector('.active-photo'));
    const photos = getTwoPhotos(category);

    photos.forEach((photo) => {
        const div = createPhotoDiv(photo);
        createIcons(div, photo);
        document.querySelector('.photos').appendChild(div);
    });
}

$(function() {
    $('[data-fancybox="images"]')({
        buttons: [
            "slideShow",
            "fullScreen",
            "thumbs",
            "close"
        ],
        loop: true, // Activer la navigation en boucle
        afterClose: function(instance, slide) {
            
            showPhotos();
        }
    });
});

    // Appeler la fonction pour afficher les photos lorsque le document est prêt
    document.addEventListener('DOMContentLoaded', showPhotos);




// La fonction pour générer et ajouter les règles CSS dynamiquement reste la même
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
                overflow: hidden;
            }
        `;
    });

    style.appendChild(document.createTextNode(css));
    head.appendChild(style);
}

// Appeler la fonction pour ajouter les règles CSS lorsque le document est prêt
document.addEventListener('DOMContentLoaded', addCssRules);



