document.addEventListener("DOMContentLoaded", () => {
    const preferenceCards = document.querySelectorAll(".preference-card");

    preferenceCards.forEach(card => {
        card.addEventListener("click", () => {
            // Inverse l'état de sélection
            const isSelected = card.getAttribute("data-selected") === "true";
            card.setAttribute("data-selected", !isSelected);
            card.classList.toggle("selected", !isSelected);
        });
    });
});