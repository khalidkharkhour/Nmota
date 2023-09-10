import '../css/index.scss';
import 'https://code.jquery.com/jquery-3.6.0.min.js'
import 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'
import { formToJSON } from 'axios';
import  'https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js';
//import  'https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js';
//import 'https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css';


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
    const menuItem = document.getElementById("menu-item-41725","CTA-instance");
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
jQuery(document).ready(function($) {
    $('.gallery-link').on('click', function(e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: galleryAjax.ajaxUrl,
            data: {
                action: 'load_gallery_images'
            },
            success: function(response) {
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
$(document).ready(function() {
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

const dropdown = document.querySelector('.custom-dropdown');

dropdown.addEventListener('change', function() {
  const selectedImageIndex = this.querySelector('li:selected').index;
  console.log('Selected image index:', selectedImageIndex);

  const imageLinks = document.querySelectorAll('.image-link');

  if (selectedImageIndex >= 0 && selectedImageIndex < imageLinks.length) {
    imageLinks[selectedImageIndex].click();
  }
});

const loadMoreImages = () => {
    // Get the array of images from the window object
    const filteredData = window.filteredData;
  
    // If there are more images to load
    if (filteredData.length) {
      // Create a new array to store the images HTML
      const imagesHTML = [];
  
      // Loop through the array of images
      for (const image of filteredData) {
        // Generate the full URL for the image
        const imageUrl = `${window.location.origin}${image.Fichier}`;
  
        // Replace the old image path with the new one
        const adjustedImageUrl = imageUrl.replace('/inc/images/', '/themes/wordplate/inc/images/');
  
        // Generate HTML for the image and add it to the array
        imagesHTML.push(`
          <div class="image-item">
            <a class="image-link" data-fancybox="images" href="${adjustedImageUrl}" data-caption="${image.Titre}">
              <img src="${adjustedImageUrl}" alt="${image.Titre}">
            </a>
          </div>
        `);
      }
  
      // Append the new HTML to the image grid
      const imageGrid = document.querySelector('.image-grid');
      imageGrid.innerHTML += imagesHTML.join('');
  
      // Hide the load more button if needed
      const loadMoreButton = document.querySelector('#load-more');
      loadMoreButton.style.display = 'none';
    }
  };
  
  /// Listen for the click event on the load more button
document.querySelector('#load-more').addEventListener('click', loadMoreImages);

/*const gallery = document.querySelector('#gallery-1');
const imageLinks = gallery.querySelectorAll('a');

// Create an array to store the image elements
const images = [];

imageLinks.forEach((link) => {
  const img = document.createElement('img');
  img.src = link.href;
  img.alt = `Image ${link.dataset.index + 1}`;
  images.push(img);
});

// Create the image carousel HTML
const carouselHTML = `
<div id="imageCarousel">
  ${images.map((img) => `
    <div><img src="${img.src}" alt="${img.alt}"></div>
  `).join('')}
</div>
`;

// Replace the gallery with the image carousel
gallery.innerHTML = carouselHTML;

// Initialize Slick carousel
$('#imageCarousel').slick();

// Add a console.log statement
console.log('Image carousel initialized.');*/
function remplacerSelectParListe(selectId) {
    const select = document.getElementById(selectId);
    const options = select.querySelectorAll("option");
    const parentDiv = select.parentElement;
  
    const ul = document.createElement("ul");
    ul.className = "options";
  
    const selected = document.createElement("span");
    selected.textContent = options[0].textContent;
    selected.className = "selected";
  
    selected.addEventListener("click", () => {
      ul.classList.toggle("open");
      ul.style.transform = ul.classList.contains("open") ? "translateY(0)" : "translateY(-100%)"; // Adjust the transform value for opening and closing
    });
  
    options.forEach((option) => {
      const li = document.createElement("li");
      li.textContent = option.textContent;
      li.value = option.value;
  
      li.addEventListener("click", () => {
        selected.textContent = option.textContent;
        ul.classList.remove("open");
        ul.style.transform = "translateY(-100%)"; // Close the dropdown after selecting an option
      });
  
      ul.appendChild(li);
    });
  
    parentDiv.removeChild(select);
    parentDiv.appendChild(selected);
    parentDiv.appendChild(ul);
  }
  
  // Appel de la fonction pour chaque conteneur de select
  remplacerSelectParListe("categorie");
  remplacerSelectParListe("format");
  remplacerSelectParListe("annee");
  document.addEventListener("DOMContentLoaded", function () {
    // Ouvrir/fermer le menu au clic sur .selected
    const selected = document.querySelector(".selected");
    const menu = document.querySelector(".custom-dropdown");
  
    selected.addEventListener("click", function () {
      menu.classList.toggle("open");
    });
  
    // Gérer la sélection d'une option
    const options = document.querySelectorAll(".options li");
  
    options.forEach(function (option) {
      option.addEventListener("click", function () {
        const selectedOption = option.textContent;
        selected.textContent = selectedOption;
        menu.classList.remove("open"); // Fermez le menu après la sélection
      });
    });
  });
  