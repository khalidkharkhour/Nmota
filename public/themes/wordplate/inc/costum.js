(function () {
    // Variables locales pour éviter les conflits
    let currentImageIndex = 0;
    const images = document.querySelectorAll('#gallery-1 img');

    // Fonction pour faire défiler la galerie
    function scrollGallery(direction) {
        currentImageIndex += direction * 2; // Défilement de deux en deux
        if (currentImageIndex < 0) {
            currentImageIndex = images.length - 1;
        } else if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        }

        // Masquer toutes les images
        images.forEach(image => {
            image.style.display = 'none';
        });

        // Afficher les images actuelles et suivantes
        images[currentImageIndex].style.display = 'block';
        if (currentImageIndex + 1 < images.length) {
            images[currentImageIndex + 1].style.display = 'block';
        }
    }

    // Appeler la fonction pour afficher les deux premières images
    scrollGallery(0);

    // Gestion des boutons de défilement
    document.querySelector('.prev').addEventListener('click', () => scrollGallery(-1));
    document.querySelector('.next').addEventListener('click', () => scrollGallery(1));
})();
/*document.addEventListener("DOMContentLoaded", function () {
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
});*/
