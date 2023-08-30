import '../css/index.scss';
import 'https://code.jquery.com/jquery-3.6.0.min.js'
import 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'
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
  document.addEventListener("DOMContentLoaded", function() {
    const menuItem = document.getElementById("menu-item-123");
    const modal = document.getElementById("myModal");
    const modalContent = modal.querySelector(".modal-content");
  
    menuItem.addEventListener("click", function(event) {
        event.preventDefault();
  
        modal.classList.add("show");
        modal.style.display = "block";
    });

    function closeModal() {
        modal.classList.remove("show");
        modal.style.display = "none";
    }

    // Fermer le modal en appuyant sur la touche "Escape"
    window.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });

    // Gérer la navigation à l'intérieur du modal avec la touche "Tab"
    modalContent.addEventListener("keydown", function(event) {
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
    window.addEventListener("click", function(event) {
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

$(document).ready(function() {
    $('.cont-box').on('change', function() {
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
  
  // Listen for the click event on the load more button
  document.querySelector('#load-more').addEventListener('click', loadMoreImages);
  const element = document.querySelector("#btn2");

