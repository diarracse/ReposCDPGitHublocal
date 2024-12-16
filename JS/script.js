const textarea = document.getElementById('message');

textarea.addEventListener('input', () => {
    textarea.style.height = 'auto'; // Réinitialise la hauteur pour recalculer
    textarea.style.height = `${textarea.scrollHeight}px`; // Ajuste à la hauteur du contenu
});
