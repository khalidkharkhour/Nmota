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
