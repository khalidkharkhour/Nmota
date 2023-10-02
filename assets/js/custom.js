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
// Écouteur d'événement pour le chargement complet du document
document.addEventListener("DOMContentLoaded", function () {
    // Sélection des éléments HTML nécessaires
    const menuItem = document.getElementsByClassName("page-item-72")[0];
    console.log(menuItem);
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
