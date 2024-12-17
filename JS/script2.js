
function viderDivRessources() {
    document.getElementById('divadherent').innerHTML = "";
}


function chargerInfosAdherent() {
    let idAdherent = this.value;

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "API/afficherAdherents.php?idadherent=" + idAdherent, true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            console.log(response);

            document.getElementById('intituleadherent').innerHTML = `${response.nom} ${response.prenom}`;

            const template = document.getElementById('templateadherent').innerHTML;
            const rendered = Mustache.render(template, response);
            document.getElementById('divadherent').innerHTML = rendered;

            // ajouter l'événement pour le bouton supprimer
            document
                .getElementById('btnSupprimer')
                .addEventListener('click', supprimerAdherent);
        }
    };
    xhttp.send();
}


function supprimerAdherent() {
    console.log(this);
    let idAdherent = this.getAttribute('data-id');

    if (!confirm("Voulez-vous vraiment supprimer cet adhérent ?")) {
        return;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "API/supprimerAdherent.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            alert(response.message);

            if (response.status === "success") {
                document.getElementById('intituleadherent').innerHTML =
                    "Sélectionnez un adhérent pour plus d'informations :";
                viderDivRessources();

                // recharger la page pour mettre à jour la liste
                window.location.reload();
            }
        }
    };
    xhttp.send("idadherent=" + idAdherent);
}





function init() {

    document.getElementById('selectAdherent').addEventListener('click', chargerInfosAdherent);

}

window.addEventListener('load', init);
