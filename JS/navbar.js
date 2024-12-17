document.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    const rect = navbar.getBoundingClientRect();
    const windowHeight = window.innerHeight; // Renommez pour éviter les conflits
    const offset = -1 * windowHeight;


    if (rect.top <= 0 && !navbar.classList.contains('position-fixed')) {
        // Si la barre atteint le haut et n'est pas déjà fixe en haut
        navbar.classList.add('position-fixed');
        navbar.classList.remove('fixed-bottom');

    } else if (window.scrollY <= Math.abs(offset) && navbar.classList.contains('position-fixed')) {
        // Si on revient au seuil (ou plus haut) et que la barre est fixe en haut
        navbar.classList.remove('position-fixed');
        navbar.classList.add('fixed-bottom');
    }
});
