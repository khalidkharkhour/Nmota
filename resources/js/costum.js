import '../js/index.js';
import '../css/style.scss';
document.addEventListener("DOMContentLoaded", function () {
    const menuItem = document.getElementById("contact");
    const modal = document.getElementById("myModal");
    const modalContent = modal.querySelector(".modal-content");
    const refPhotoInput = document.getElementById("ref-photo-input"); // Champ Réf. Photo dans le formulaire

    menuItem.addEventListener("click", function (event) {
        event.preventDefault();

        //  la valeur de l'attribut data-ref-photo du bouton
        const reference = menuItem.getAttribute("data-ref-photo");

        // le champ du formulaire avec la valeur de data-ref-photo
        refPhotoInput.value = reference;

        //  l'image affichée dans la galerie pour correspondre à la référence
        const images = document.querySelectorAll('#gallery-1 img');
        for (let i = 0; i < images.length; i++) {
            if (images[i].getAttribute('data-ref-photo') === reference) {
                currentImageIndex = i;
                showCurrentImage();
                break;
            }
        }

        modal.classList.add("show");
        modal.style.display = "block";
    });
});

const largeurFenetre = window.innerWidth;
const hauteurFenetre = window.innerHeight;

console.log("Largeur de la fenêtre : " + largeurFenetre + "px");
console.log("Hauteur de la fenêtre : " + hauteurFenetre + "px");
//  tous les éléments avec la classe "team-mari-e"
const elements = document.querySelectorAll('.team-mari-e');

//  chaque élément et remplacez '/' par un espace dans son titre
elements.forEach(function (element) {
    let title = element.textContent; //  le texte à l'intérieur de l'élément
    let newTitle = title.replace(/\//g, "'"); //  toutes les occurrences de '/' par un espace

    //  le texte à l'intérieur de l'élément avec le nouveau titre
    element.textContent = newTitle;
});
document.addEventListener("DOMContentLoaded", function() {
  
    let currentIndex  = 0;
    const images = document.querySelectorAll('.galler-item img');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    
    const photoLinks = {
        "0.webp": "sante",
        "1.webp": "et-bon-anniversaire",
        "2.webp": "lets-party",
        "3.webp": "tout-est-installe",
        "4.webp": "vers-leternite",
        "5.webp": "embrassez-la-mariee",
        "6.webp": "dansons-ensemble",
        "7.webp": "le-menu",
        "8.webp": "au-bal-masque",
        "9.webp": "let-s-dance",
        "10.webp": "jour-de-match",
        "11.webp": "preparation",
        "12.webp": "biere-ou-eau-plate",
        "13.webp": "bouquet-final",
        "14.webp": "du-soir-au-matin",
        "15.webp": "team-mariee"
    };

    function showImage(index) {
        for (let i = 0; i < images.length; i++) {
            images[i].style.display = 'none';
        }
        images[index].style.display = 'block';

        // Obtenir le nom de l'image actuelle
        const currentImageSrc = images[index].src;
        const imageName = currentImageSrc.substring(currentImageSrc.lastIndexOf('/') + 1);

        // Vérifier si l'image correspond à une clé dans le tableau photoLinks
        if (photoLinks.hasOwnProperty(imageName)) {
            // Faire quelque chose avec la valeur associée, par exemple :
            const imageDescription = photoLinks[imageName];
            console.log(`Description de l'image : ${imageDescription}`);
        }
    }

    function goToPreviousImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    }

    function goToNextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    // Vérifier si l'URL contient un paramètre "photo"
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("photo")) {
        const photoName = urlParams.get("photo");
        // Trouver l'index de l'image correspondant au nom dans le tableau photoLinks
        for (let i = 0; i < images.length; i++) {
            const currentImageSrc = images[i].src;
            const imageName = currentImageSrc.substring(currentImageSrc.lastIndexOf('/') + 1);
            if (imageName === `${photoName}.webp`) {
                currentIndex = i;
                break;
            }
        }
    }

    // Afficher l'image correspondante au chargement de la page
    showImage(currentIndex);

    // Gérer les clics sur les boutons précédent et suivant
    prevButton.addEventListener('click', goToPreviousImage);
    nextButton.addEventListener('click', goToNextImage);
});
