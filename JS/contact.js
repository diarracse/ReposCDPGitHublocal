let textarea = document.getElementById('message');

textarea.addEventListener('input', () => {
    textarea.style.height = 'auto'; // Réinitialise la hauteur pour recalculer
    textarea.style.height = `${textarea.scrollHeight}px`; // Ajuste à la hauteur du contenu
});


// Attache l'événement de soumission du formulaire
document.getElementById('envoyerContact').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire par défaut

    // Récupération des champs du formulaire
    let nom = document.getElementById('nom');
    let prenom = document.getElementById('prenom');
    let email = document.getElementById('email');
    let objet = document.getElementById('objet');
    let message = document.getElementById('message');

    // Validation des champs
    if (nom.value && prenom.value && email.value && objet.value && message.value) {
        // Affiche une popup de succès si tous les champs sont remplis
        alert("Votre demande sera traitée dans les plus brefs délais. Merci de votre confiance !");
        
        // Redirection vers la page d'accueil après confirmation
        window.location.href = 'index.php'; // Remplace '/' par l'URL de ta page d'accueil
    } else {
        // Affiche une alerte si des champs sont manquants
        alert("Veuillez remplir tous les champs du formulaire avant de soumettre.");
    }
});

