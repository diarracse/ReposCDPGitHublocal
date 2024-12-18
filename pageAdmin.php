<?php
include("config/config.php");


// requête pour les évènements
$requete = 'SELECT * FROM Evenement ORDER BY date_evenement';
$resultats = $dbh->query($requete);
$tableauEvenement = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// requête afficher les adhérents
$requete = 'SELECT * FROM Adherent ORDER BY nom, prenom';
$resultats = $dbh->query($requete);
$tableauAdherent = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

$nbAdherent = count($tableauAdherent);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/AjoutEvenement.js"></script>
    <title>Page Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/mustache.min.js"></script>
    <script src="JS/script2.js"></script>
    <script src="JS/modifierSupprimer.js"></script>

</head>

<body>
    <?php include('include/menu.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div id="formEvenement" class="container p-5 my-5 shadow rounded-5">
                    <h2 class="text-center fw-bold mb-4">Tous les évènements</h2>
                    <p id="intituleevenement" class="d-flex flex-column align-items-center">Sélectionnez un évènement pour plus d'informations :</p>
                    <div id="divevenement"></div>

                    <!-- Selecteur d'événements -->
                    <form method="GET">
                        <select id="selectEvenement" name="idevenement" size="5" class="form-control rounded-4 mx-auto text-center">
                            <?php foreach ($tableauEvenement as $evenement): ?>
                                <option value="<?= htmlspecialchars($evenement['id_evenement']) ?>">
                                    <?= htmlspecialchars($evenement['titre']) ?> - <?= htmlspecialchars($evenement['date_evenement']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </form>

                    <!-- formulaire pour modifier -->
                    <div id="formModifierEvenement">
                        <h2 class="text-center fw-bold mt-4 mb-4">Modifier l'évènement</h2>
                            <form id="modifierForm">
                            <input type="hidden" id="idEvenement" name="idEvenement">
                            <input type="text" class="form-control rounded-4 mx-auto" id="titre" name="titre" placeholder="Nom de l'évènement"><br>
                            <textarea class="form-control rounded-4 mx-auto" id="description" name="description" placeholder="Description"></textarea><br>
                            <input type="text" class="form-control rounded-4 mx-auto" id="lieu" name="lieu" placeholder="Lieu"><br>
                            <input type="date" class="form-control rounded-4 mx-auto" id="date_evenement" name="date_evenement" placeholder="Date de l'évènement"><br>
                            <input type="text" class="form-control rounded-4 mx-auto" id="image" name="image" placeholder="URL de l'image"><br>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="CTA">Enregistrer les modifications</button>
                            </div>
                        </form>
                    </div>

                    <script id="templateevenement" type="text/html">
                        <ul class="list-unstyled text-center">
                            <li>Description: {{description}}</li>
                            <li>Date de l'évènement : {{date_evenement}}</li>
                            <li>Lieu : {{lieu}}</li>
                        </ul>

                        <div class="d-flex justify-content-center">
                            <button id="btnModifier" class="CTA me-3" data-id="{{id_evenement}}">Modifier</button>
                            <button id="btnSupprimer" class="CTA" data-id="{{id_evenement}}">Supprimer</button>
                        </div>
                    </script>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div id="formEvenement" class="container p-5 my-5 shadow rounded-5">
                    <h2 class="text-center fw-bold mb-4">Liste des adhérents</h2>
                    <p id="intituleadherent" class="d-flex flex-column align-items-center">Sélectionnez un adhérent pour plus d'informations :</p>
                    <div id="divadherent"></div>

                    <form method="GET">
                        <select id="selectAdherent" name="idadherent" size="5" class="form-control rounded-4 text-center" >
                            <?php
                            // boucle pour afficher chaque infos en fonction de l'id
                            foreach ($tableauAdherent as $adherent) {
                                $nom = htmlspecialchars($adherent["nom"]);
                                $prenom = htmlspecialchars($adherent["prenom"]);
                                $idAdherent = htmlspecialchars($adherent["id_adherent"]);
                                echo "<option value=\"$idAdherent\">$nom $prenom</option>\n";
                            }
                            ?>
                        </select>
                    </form>

                    <!-- template Mustache -->
                    <!-- infos qui s'affichent en haut -->

                    <script id="templateadherent" type="text/html">
                        <div class="d-flex flex-column align-items-center">
                            <ul class="list-unstyled text-center">
                                <li>Date d'inscription : {{date_inscription}}</li>
                                <li>Email : {{email}}</li>
                                <li>Type d'adhésion : {{type_adhesion}}</li>
                            </ul>

                            <div class="d-flex justify-content-center">
                                <button id="btnSupprimer" class="CTA" data-id="{{id_adherent}}">Supprimer</button>
                            </div>
                        </div>
                    </script>
                </div>
            </div>       
        </div>
    </div>


    <?php include('include/footer.php'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>