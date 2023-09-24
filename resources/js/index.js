import '../css/index.scss';
import '../css/fancy.css';
import '../js/slider.js';
import '../js/costum.js';
import '../css/style.scss';
//import $ from 'jquery';
import 'https://code.jquery.com/jquery-3.6.0.min.js'

import { formToJSON } from 'axios';
//import 'select2';
import slugify from 'slugify';
import  'confetti-js';



// Sélectionnez un bouton ou un élément sur lequel vous souhaitez déclencher le confetti
const buttonElement = document.getElementById('menu-item-41725');

// Attachez un gestionnaire d'événements pour le clic sur le bouton
buttonElement.addEventListener('click', () => {
  // Options de configuration pour l'effet de confetti (vous pouvez personnaliser cela selon vos besoins)
  const confettiConfig = {
    particleCount: 100,
    spread: 70,
    colors: ['#FF0000', '#00FF00', '#0000FF'],
  };

  // Déclenchez l'effet de confetti
  confetti(confettiConfig);
});

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
$(function($) {
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
$(function() {
    $('[data-fancybox="images"]')({
        buttons: [
            "slideShow",
            "fullScreen",
            "thumbs",
            "close"
        ],
        loop: true, // Activer la navigation en boucle
        margin: [20, 20] 
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
           // const str = "This is a string with -,&, <, >, \", and ' characters.";
          //  const escapedStr = encodeURIComponent(str);
          // Create a mapping of image titles to image keys
// Créez une correspondance entre les titres d'image et les clés d'image
 /*const photoLinks = {
     "sante":"0.webp",//themes/wordplate/inc/images/0.webp
      'et-bon-anniversaire':"1.webp",//themes/wordplate/inc/images/1.webp
      "lets-party":"2.webp",//themes/wordplate/inc/images/2.webp
      'tout-est-installe':"3.webp",//themes/wordplate/inc/images/3.webp
      "vers-leternite":"4.webp",//themes/wordplate/inc/images/4.webp
      'embrassez-la-mariee':"5.webp",//themes/wordplate/images/5.webp
      'dansons-ensemble':"6.webp",//themes/wordplate/inc/images/6.webp
     'le-menu':"7.webp",//themes/wordplate/inc/images/7.webp
      'au-bal-masque':"8.webp",//themes/wordplate/inc/images/8.webp
    "let-s-dance":"9.webp",//themes/wordplate/inc/images/9.webp
    "jour-de-match": "10.webp",
    "preparation": "11.webp",
    "biere-ou-eau-plate ": "12.webp",
    "bouquet-final": "13.webp",
    "du-soir-au-matin": "14.webp",
    "team-mariee": "15.webp",
};*/


const imageReference = image['Référence'];
const imageCategory = image['Catégorie'];
const imageTitle = image['Titre'];
const slug = slugify(imageTitle);
imagesHTML.push(`
    <div class="image-item">
        <span class="image-link" data-fancybox="images" href="${adjustedImageUrl}" data-caption="<a class='fa fa-eye' href='/?photo=${slugify(imageTitle)}'></a><p>${imageCategory}</p><p>${imageReference}</p>">
            <img src="${adjustedImageUrl}" alt="${imageReference}"class="nathalie">
        </span>
    </div>
`);

//const photoUrl = `/?photo=${encodeURIComponent(imageTitle)}`;  
        }
  
        // Append the new HTML to the image grid
        const imageGrid = document.querySelector('.image-grid');
        imageGrid.innerHTML += imagesHTML.join('');
  
        // Hide the load more button if needed
        const loadMoreButton = document.querySelector('#load-more');
        loadMoreButton.style.display = 'none';
  
        // Display the return button
        const returnButton = document.querySelector('#return-button');
        returnButton.style.display = 'block';
    }
  };
  
  // Listen for the click event on the load more button
  document.querySelector('#load-more').addEventListener('click', loadMoreImages);
  
  // Listen for the click event on the return button
  document.querySelector('#return-button').addEventListener('click', () => {
    
     window.location.href = 'http://localhost:8000/';
    
  });
  

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
/*function remplacerSelectParListe(selectId) {
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
  });*/
 
  
    // Sélectionnez les éléments <select> par leurs ID et ajoutez des écouteurs d'événements JavaScript
    const categorieSelect = document.getElementById('categorie');
    const formatSelect = document.getElementById('format');
    const anneeSelect = document.getElementById('annee');
    
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
    $(function () {
      $('.custom-dropdown').on('change', function () {
 
          const selectedImageIndex = $(this).find('option:selected').index();
          console.log("Selected image index:", selectedImageIndex);
  
         /* $("select option#btn2").css("color", "black"); // Appliquer le style ici
          $(this).find("option:selected").css("color", "rgba(224, 0, 0, 1)");*/
          const imageLinks = $('.image-link');
  
          if (selectedImageIndex >= 0 && selectedImageIndex < imageLinks.length) {
              imageLinks.eq(selectedImageIndex).trigger('click');
          }
     });
  });
 
  $(function () {
    $('.custom-dropdown').on('change', function () {
        const selectedCategorie = $('#categorie').val();
        const selectedFormat = $('#format').val();
        const selectedAnnee = $('#annee').val();

        // Construire le chemin de l'image correspondante en fonction des sélections
        let imagePath = `images/${selectedCategorie}_${selectedFormat}_${selectedAnnee}.webp`;

        // Ajuster le chemin de l'image en remplaçant la partie spécifiée
        imagePath = imagePath.replace('/inc/images/', '/themes/wordplate/inc/images/');

        // Créer une nouvelle image pour vérifier si elle existe
        const tempImage = new Image();
        tempImage.src = imagePath;

        // Attacher un gestionnaire d'événement pour vérifier si l'image est chargée
        tempImage.onload = function () {
            // L'image existe, mettez à jour l'attribut src de l'élément .image-link
            $('.image-link').attr('src', imagePath);
            // Afficher l'image
            $('.image-link').css('display', 'block');
        };

        // Attacher un gestionnaire d'événement pour gérer le cas où l'image n'est pas trouvée
        tempImage.onerror = function () {
            // L'image n'existe pas, vous pouvez afficher un message d'erreur ou masquer l'élément
            $('.image-link').css('display', 'none');
            setTimeout(function() {
                $('.image-link').css('display', 'block');
            }, 300); // 300 milliseconds (0.3 seconds)
            
        };
    });
});


 /*$(function() {
    // Initialisez Select2 sur l'élément de votre choix avec des options de personnalisation
    $('#mySelect').select2({
        templateResult: function(option) {
            // Personnalisez le style des options ici
            const backgroundColor = '#ff0000'; // Couleur de fond des options
            const textColor = '#333'; // Couleur du texte des options
            
            return $('<span style="background-color:' + backgroundColor + '; color:' + textColor + ';">' + option.text + '</span>');
        },
        templateSelection: function(option) {
            // Personnalisez le style de la sélection ici
            const backgroundColor = '#ff0000'; // Couleur de fond de la sélection
            const textColor = '#333'; // Couleur du texte de la sélection
            
            return $('<span style="background-color:' + backgroundColor + '; color:' + textColor + ';">' + option.text + '</span>');
        }
    });
});*/
