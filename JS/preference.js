document.addEventListener("DOMContentLoaded", () => {
    let preferenceCards = document.querySelectorAll(".preference-card");

    preferenceCards.forEach(card => {
        card.addEventListener("click", () => {
            // Inverse l'état de sélection
            let isSelected = card.getAttribute("data-selected") === "true";
            card.setAttribute("data-selected", !isSelected);
            card.classList.toggle("selected", !isSelected);
        });
    });
});