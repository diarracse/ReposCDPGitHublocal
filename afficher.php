<?php
include("config/config.php");



$requete = 'SELECT * FROM Adherent ORDER BY nom, prenom';
$resultats = $pdo->query($requete);
$tableauAdherent = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

$nbAdherent = count($tableauAdherent);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Adhérents</title>
    <meta name="description" content="Liste des adhérents et leurs informations.">
</head>

<body>
    <h1>Liste des adhérents</h1>
    <h2 id="intituleadherent">Sélectionnez un adhérent pour plus d'informations :</h2>
    <div id="divadherent"></div>

    <form method="GET">
        <select id="selectAdherent" name="idadherent" size="5">
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
        <ul>
            <li>Date d'inscription : {{date_inscription}}</li>
            <li>Email : {{email}}</li>
            <li>Type d'adhésion : {{type_adhesion}}</li>
        </ul>

        <button id="btnSupprimer" data-id="{{id_adherent}}">Supprimer cet adhérent</button>
    </script>

    <script src="js/mustache.min.js"></script>
    <script src="js/script2.js"></script>
</body>

</html>