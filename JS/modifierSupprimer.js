function viderDivRessources() {
    document.getElementById('divevenement').innerHTML = "";
    document.getElementById('formModifierEvenement').style.display = "none"; // Cache le formulaire
}


function chargerInfosEvenement() {
    let idEvenement = this.value;

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "API/afficherEvenement.php?idevenement=" + idEvenement, true);
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText);
            console.log(response);

            if (response.error) {
                alert(response.error);
                return;
            }

         
            document.getElementById('intituleevenement').innerHTML = `${response.titre}`;
            const template = document.getElementById('templateevenement').innerHTML;
            const rendered = Mustache.render(template, response);
            document.getElementById('divevenement').innerHTML = rendered;

           
            document
                .getElementById('btnModifier')
                .addEventListener('click', function () {
                    chargerFormulaireModification(response);
                });

           
            document
                .getElementById('btnSupprimer')
                .addEventListener('click', supprimerEvenement);
        }
    };
    xhttp.send();
}


function chargerFormulaireModification(response) {
    // Remplit le formulaire avec les données récupérées
    document.getElementById('idEvenement').value = response.id_evenement;
    document.getElementById('titre').value = response.titre;
    document.getElementById('description').value = response.description;
    document.getElementById('lieu').value = response.lieu;
    document.getElementById('date_evenement').value = response.date_evenement;
    document.getElementById('image').value = response.image;

    // Affiche le formulaire
    document.getElementById('formModifierEvenement').style.display = "block";
}

// Envoyer les modifications de l'événement
function envoyerModificationEvenement(e) {
    e.preventDefault();

    var formData = new FormData(document.getElementById('modifierForm'));
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "API/modifierEvenement.php", true);
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText);
            alert(response.message);

            if (response.status === "success") {
                document.getElementById('formModifierEvenement').style.display = "none";
                viderDivRessources();
                window.location.reload();
            }
        }
    };
    xhttp.send(new URLSearchParams(formData));
}

// Supprimer un événement
function supprimerEvenement() {
    let idEvenement = this.getAttribute('data-id');

    if (!confirm("Voulez-vous vraiment supprimer cet évènement ?")) {
        return;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "API/supprimerEvenement.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText);
            alert(response.message);

            if (response.status === "success") {
                document.getElementById('intituleevenement').innerHTML =
                    "Sélectionnez un évènement pour plus d'informations :";
                viderDivRessources();
                window.location.reload();
            }
        }
    };
    xhttp.send("idevenement=" + idEvenement);
}

// Initialisation
function init() {
    document.getElementById('selectEvenement').addEventListener('change', chargerInfosEvenement);
    document.getElementById('modifierForm').addEventListener('submit', envoyerModificationEvenement);
}

window.addEventListener('load', init);
