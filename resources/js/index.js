import '../css/index.scss';
import 'https://code.jquery.com/jquery-3.6.0.min.js'
import 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'
import { formToJSON } from 'axios';
// Créer l'élément <h1> avec le texte "PHOTOGRAPHE EVENT"
const h1Element = document.createElement("h1");
h1Element.textContent = "PHOTOGRAPHE EVENT";

// Ajouter des classes à l'élément <h1>
h1Element.classList.add("hero-content");

// Créer l'élément <div> pour englober l'élément <h1>
const divElement = document.createElement("div");
divElement.classList.add("hero-content");
divElement.appendChild(h1Element);

// Créer l'élément <article> avec la classe "hero"
const articleElement = document.createElement("article");
articleElement.classList.add("hero");
articleElement.appendChild(divElement);

// Sélectionner l'élément <header>
const headerElement = document.querySelector("header");

// Insérer l'élément <article> à l'intérieur de l'élément <header>
headerElement.appendChild(articleElement);


module.exports = {
    parser: 'postcss-scss',
    plugins: {

    }
}
document.addEventListener("DOMContentLoaded", function () {
    const menuItem = document.getElementById("menu-item-123");
    const modal = document.getElementById("myModal");
    const modalContent = modal.querySelector(".modal-content");

    menuItem.addEventListener("click", function (event) {
        event.preventDefault();

        modal.classList.add("show");
        modal.style.display = "block";
    });

    function closeModal() {
        modal.classList.remove("show");
        modal.style.display = "none";
    }

    // Fermer le modal en appuyant sur la touche "Escape"
    window.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });

    // Gérer la navigation à l'intérieur du modal avec la touche "Tab"
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

    // Fermer le modal en cliquant en dehors de celui-ci
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});
jQuery(document).ready(function ($) {
    $('.gallery-link').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: galleryAjax.ajaxUrl,
            data: {
                action: 'load_gallery_images'
            },
            success: function (response) {
                if (response.success) {
                    const images = response.data;
                    const galleryHtml = '';

                    for (const i = 0; i < images.length; i++) {
                        galleryHtml += '<a href="' + images[i] + '" data-lightbox="gallery"><img src="' + images[i] + '" alt="Image ' + (i + 1) + '"></a>';
                    }

                    $('.lightbox-container').html(galleryHtml); // Remplacez ".lightbox-container" par le sélecteur approprié
                    lightbox.init(); // Initialisez la lightbox
                } else {
                    console.log('Erreur lors du chargement des images.');
                }
            }
        });
    });
});
$(document).ready(function () {
    $('[data-fancybox="images"]').fancybox({
        buttons: [
            "slideShow",
            "fullScreen",
            "thumbs",
            "close"
        ],
        loop: true // Activer la navigation en boucle
    });
});

$(document).ready(function () {
    $('.cont-box').on('change', function () {
        const selectedImageIndex = $(this).find('option:selected').index();
        console.log("Selected image index:", selectedImageIndex);

        /*$("select option#btn2").css("color", "black"); // Appliquer le style ici
        $(this).find("option:selected").css("color", "rgba(224, 0, 0, 1)");*/
        const imageLinks = $('.image-link');

        if (selectedImageIndex >= 0 && selectedImageIndex < imageLinks.length) {
            imageLinks.eq(selectedImageIndex).trigger('click');
        }
    });
});
const loadMoreImages = () => {
    // Récupérer le tableau d'images depuis l'objet window
    const filteredData = window.filteredData;

    // S'il y a plus d'images à charger
    if (filteredData.length) {
        // Créer un nouveau tableau pour stocker le HTML des images
        const imagesHTML = [];

        // Parcourir le tableau d'images
        for (const image of filteredData) {
            // Générer l'URL complète de l'image
            const imageUrl = `${window.location.origin}${image.Fichier}`;

            // Remplacer l'ancien chemin d'accès de l'image par le nouveau
            const adjustedImageUrl = imageUrl.replace('/inc/images/', '/themes/wordplate/inc/images/');
            console.log('URL de l\'image ajustée:', adjustedImageUrl); // Ajouter cette ligne pour afficher l'URL ajustée dans la console

            // Générer le HTML pour l'image et l'ajouter au tableau
            imagesHTML.push(`
                <div class="image-item">
                    <a class="image-link" data-fancybox="images" href="${adjustedImageUrl}" data-caption="${image.Titre}">
                        <img src="${adjustedImageUrl}" alt="${image.Titre}">
                    </a>
                </div>
            `);
        }

        // Ajouter le nouveau HTML à la grille d'images
        const imageGrid = document.querySelector('.image-grid');
        imageGrid.innerHTML += imagesHTML.join('');

        // Masquer le bouton "Charger plus" si nécessaire
        const loadMoreButton = document.querySelector('#load-more');
        loadMoreButton.style.display = 'none';
    }
};
// Listen for the click event on the load more button
  document.querySelector('#load-more').addEventListener('click', loadMoreImages);
  const element = document.querySelector("#btn2");
  element.addEventListener("click", function() {
    window.history.back();
  });
/*const selectBoxes = document.querySelectorAll('select');

for (const i = 0; i < selectBoxes.length; i++) {
  selectBoxes[i].addEventListener('focus', function() {
    this.size = 3;
    this.setAttribute('data-toggle', 'dropdown');
    this.setAttribute('aria-expanded', 'true');
  });

  selectBoxes[i].addEventListener('blur', function() {
    this.size = this.options.length;
    this.removeAttribute('data-toggle');
    this.removeAttribute('aria-expanded');
  });
}*/
/*document.addEventListener("DOMContentLoaded", function() {
    const arrow = document.getElementById("#flex");
    const menu = document.getElementById(".cont-box");
  
    arrow.addEventListener("click", function() {
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    });
  });*/
  
 /* $(document).ready(function() {
    $('select').click(function() {
      // Défiler le menu
      $(this).children('select').slideDown();
    });
  });
  jQuery(document).ready(function ($) {
    $(".show-details").click(function (e) {
        e.preventDefault();

        // Insérez ici le code pour rediriger vers photo-single.php
        window.location.href = 'URL_VERS_photo-single.php';
    });
});*/
