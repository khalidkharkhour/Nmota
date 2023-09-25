// Importation des fichiers CSS et JavaScript nécessaires
import '../css/index.scss';
import '../css/fancy.css';
import '../js/slider.js';
import '../js/costum.js';
import '../css/style.scss';

// Importation de la bibliothèque jQuery depuis un CDN
import 'https://code.jquery.com/jquery-3.6.0.min.js';

// Importation d'une fonction spécifique depuis la bibliothèque Axios
import { formToJSON } from 'axios';

// Importation de la fonction 'slugify' depuis le module 'slugify'
import slugify from 'slugify';

// Importation de la bibliothèque 'confetti-js'
import 'confetti-js';

// Sélection de l'élément HTML avec l'ID 'menu-item-41725'
const buttonElement = document.getElementById('menu-item-41725');

// Ajout d'un écouteur d'événements pour le clic sur cet élément
buttonElement.addEventListener('click', () => {
    // Configuration de l'effet de confettis
    const confettiConfig = {
        particleCount: 100,
        spread: 70,
        colors: ['#FF0000', '#00FF00', '#0000FF'],
    };

    // Activation de l'effet de confettis
    confetti(confettiConfig);
});

// Création et configuration d'éléments HTML
const h1Element = document.createElement("h1");
h1Element.textContent = "PHOTOGRAPHE EVENT";
h1Element.classList.add("hero-content");

const divElement = document.createElement("div");
divElement.classList.add("hero-content");
divElement.appendChild(h1Element);

const articleElement = document.createElement("article");
articleElement.classList.add("hero");
articleElement.appendChild(divElement);

const headerElement = document.querySelector("header");
headerElement.appendChild(articleElement);

// Exportation d'un objet avec des configurations pour PostCSS
module.exports = {
    parser: 'postcss-scss',
    plugins: {

    }
}

// Écouteur d'événement pour le chargement complet du document
document.addEventListener("DOMContentLoaded", function () {
    // Sélection des éléments HTML nécessaires
    const menuItem = document.getElementById("menu-item-41725");
    const modal = document.getElementById("myModal");
    const modalContent = modal.querySelector(".modal-content");

    // Ajout d'un écouteur d'événements pour le clic sur le bouton de menu
    menuItem.addEventListener("click", function (event) {
        event.preventDefault();
        modal.classList.add("show");
        modal.style.display = "block";
    });

    // Fonction pour fermer le modal
    function closeModal() {
        modal.classList.remove("show");
        modal.style.display = "none";
    }

    // Fermeture du modal en appuyant sur la touche "Escape"
    window.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });

    // Navigation à l'intérieur du modal avec la touche "Tab"
    modalContent.addEventListener("keydown", function (event) {
        if (event.key === "Tab") {
            const focusableElements = modalContent.querySelectorAll("a[href], button, input, select, textarea");
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            if (!event.shiftKey && document.activeElement === lastElement) {
                event.preventDefault();
                firstElement.focus();
            } else if (event.shiftKey && document.activeElement === firstElement) {
                event.preventDefault();
                lastElement.focus();
            }
        }
    });

    // Fermeture du modal en cliquant en dehors de celui-ci
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});

// Utilisation de jQuery pour manipuler des éléments HTML
$(function ($) {
    // Ajout d'un gestionnaire d'événements au clic sur les liens avec la classe 'gallery-link'
    $('.gallery-link').on('click', function (e) {
        e.preventDefault();

        // Envoi d'une requête AJAX pour charger des images de la galerie
        $.ajax({
            type: 'POST',
            url: galleryAjax.ajaxUrl,
            data: {
                action: 'load_gallery_images'
            },
            success: function (response) {
                if (response.success) {
                    // Manipulation des images chargées
                    const images = response.data;
                    let galleryHtml = '';
                    for (let i = 0; i < images.length; i++) {
                        galleryHtml += '<a href="' + images[i] + '" data-lightbox="gallery"><img src="' + images[i] + '" alt="Image ' + (i + 1) + '"></a>';
                    }
                    $('.lightbox-container').html(galleryHtml);
                    lightbox.init();
                } else {
                    console.log('Erreur lors du chargement des images.');
                }
            }
        });
    });
});

// Utilisation de jQuery pour configurer une lightbox
$(function () {
    $('[data-fancybox="images"]').fancybox({
        buttons: [
            "slideShow",
            "fullScreen",
            "thumbs",
            "close"
        ],
        loop: true, // Navigation en boucle
        margin: [20, 20]
    });
});

// Fonction pour charger davantage d'images
const loadMoreImages = () => {
    const filteredData = window.filteredData;
    if (filteredData.length) {
        const imagesHTML = [];
        for (const image of filteredData) {
            const imageUrl = `${window.location.origin}${image.Fichier}`;
            const adjustedImageUrl = imageUrl.replace('/inc/images/', '/themes/wordplate/inc/images/');
            const imageReference = image['Référence'];
            const imageCategory = image['Catégorie'];
            const imageTitle = image['Titre'];
            const slug = slugify(imageTitle);

            imagesHTML.push(`
                <div class="image-item">
                    <span class="image-link" data-fancybox="images" href="${adjustedImageUrl}" data-caption="<a 'eye' href='/?photo=${slugify(imageTitle)}'></a><p>${imageCategory}</p><p>${imageReference}</p>">
                        <img src="${adjustedImageUrl}" alt="${imageReference}" class="nathalie">
                    </span>
                </div>
            `);
        }
        const imageGrid = document.querySelector('.image-grid');
        imageGrid.innerHTML += imagesHTML.join('');
        const loadMoreButton = document.querySelector('#load-more');
        loadMoreButton.style.display = 'none';
        const returnButton = document.querySelector('#return-button');
        returnButton.style.display = 'block';
    }
};

// Ajout d'un écouteur d'événements pour le bouton "Charger plus d'images"
document.querySelector('#load-more').addEventListener('click', loadMoreImages);

// Ajout d'un écouteur d'événements pour le bouton "Retour"
document.querySelector('#return-button').addEventListener('click', () => {
    window.location.href = 'http://localhost:8000/';
});

// Sélection des éléments de formulaire
const categorieSelect = document.getElementById('categorie');
const formatSelect = document.getElementById('format');
const anneeSelect = document.getElementById('annee');

// Gestion de la taille des menus déroulants lorsqu'ils sont en focus
categorieSelect.addEventListener('focus', function () {
    this.size = 3;
});

categorieSelect.addEventListener('blur', function () {
    this.size = 1;
});

categorieSelect.addEventListener('change', function () {
    this.size = 1;
    this.blur();
});

formatSelect.addEventListener('focus', function () {
    this.size = 3;
});

formatSelect.addEventListener('blur', function () {
    this.size = 1;
});

formatSelect.addEventListener('change', function () {
    this.size = 1;
    this.blur();
});

anneeSelect.addEventListener('focus', function () {
    this.size = 3;
});

anneeSelect.addEventListener('blur', function () {
    this.size = 1;
});

anneeSelect.addEventListener('change', function () {
    this.size = 1;
    this.blur();
});

// Utilisation de jQuery pour détecter le changement dans les menus déroulants personnalisés
$(function () {
    $('.custom-dropdown').on('change', function () {
        const selectedImageIndex = $(this).find('option:selected').index();
        console.log("Index de l'image sélectionnée :", selectedImageIndex);
        const imageLinks = $('.image-link');
        if (selectedImageIndex >= 0 && selectedImageIndex < imageLinks.length) {
            imageLinks.eq(selectedImageIndex).trigger('click');
        }
    });
});

// Utilisation de jQuery pour mettre à jour les images en fonction des sélections dans les menus déroulants
$(function () {
    $('.custom-dropdown').on('change', function () {
        const selectedCategorie = $('#categorie').val();
        const selectedFormat = $('#format').val();
        const selectedAnnee = $('#annee').val();
        let imagePath = `images/${selectedCategorie}_${selectedFormat}_${selectedAnnee}.webp`;
        imagePath = imagePath.replace('/inc/images/', '/themes/wordplate/inc/images/');
        const tempImage = new Image();
        tempImage.src = imagePath;
        tempImage.onload = function () {
            $('.image-link').attr('src', imagePath);
            $('.image-link').css('display', 'block');
        };
        tempImage.onerror = function () {
            $('.image-link').css('display', 'none');
            setTimeout(function () {
                $('.image-link').css('display', 'block');
            }, 300);
        };
    });
});
