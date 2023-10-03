document.addEventListener("DOMContentLoaded", () => {
    //const currentFile = scriptData.currentFile;
    let currentIndex = Math.floor(Math.random() * 10) + 1;
    const images = document.querySelectorAll('.galler-item img');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');

    function showImage(index) {
        for (let i = 0; i < images.length; i++) {
            images[i].style.display = 'none';
        }
    
        // Afficher uniquement l'image avec l'index spécifié
        if (index >= 0 && index < images.length) {
            images[index].style.display = 'block';
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

    // Afficher l'image correspondante à l'index actuel au chargement de la page
    showImage(currentIndex);

    // Gérer les clics sur les boutons précédent et suivant
    prevButton.addEventListener('click', goToPreviousImage);
    nextButton.addEventListener('click', goToNextImage);
});
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