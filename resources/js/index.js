import '../css/index.scss';
import 'https://code.jquery.com/jquery-3.6.0.min.js'
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
