<?php
include("config/config.php");


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
    <script src="js/mustache.min.js"></script>
    <script src="js/script2.js"></script>
</head>

<body>
    <?php include('include/menu.php'); ?>

    <!-- Ajouter un évènement -->

    <form id="formEvenement" class="container p-5 my-5 shadow rounded-5">

        <h2 class="text-center fw-bold mb-4 mx-auto" style="max-width: 90%;">Ajouter un Événement</h2>

        <div class="mb-3">
            <label for="titre"></label>
            <input type="text" class="form-control rounded-4 mx-auto" id="titre" name="titre" placeholder="Nom de l'Évènement" required>
        </div>

        <div class="mb-3">
            <label for="nom_type"></label>
            <input type="text" class="form-control rounded-4 mx-auto" id="nom_type" name="nom_type" placeholder="Type" required>
        </div>

        <div class="mb-3">
            <label for="date_evenement"></label>
            <input type="date" class="form-control rounded-4 mx-auto" id="date_evenement" name="date_evenement" required>
        </div>

        <div class="mb-3">
            <label for="lieu"></label>
            <input type="text" class="form-control rounded-4 mx-auto" id="lieu" name="lieu" placeholder="Lieu" required>
        </div>

        <div class="mb-3">
            <label for="description"></label>
            <textarea class="form-control rounded-4 mx-auto" id="description" name="description" placeholder="Description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image"></label>
            <input type="text" class="form-control rounded-4 mx-auto" id="image" name="image" placeholder="URL de l'image" required>
        </div>

        <button type="submit" class="CTA">Ajouter l'Événement</button>
    </form>

    <!-- Affichier et supprimer un adhérent -->

    <form id="formEvenement" class="container p-5 my-5 shadow rounded-5">

        <h1 class="text-center fw-bold mb-4 mx-auto" style="max-width: 90%;">Liste des adhérents</h1>
        <h2 id="intituleadherent" class="d-flex flex-column align-items-center">Sélectionnez un adhérent pour plus d'informations :</h2>
        <div id="divadherent"></div>

        <form method="GET">
            <select id="selectAdherent" name="idadherent" size="5" class="form-control rounded-4 mx-auto text-center" >
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
                    <button id="btnSupprimer" class="CTA" data-id="{{id_adherent}}">Supprimer cet adhérent</button>
                </div>
            </div>
        </script>
    </form>
    


    <?php include('include/footer.php'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>