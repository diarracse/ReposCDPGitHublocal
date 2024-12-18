<?php
include("config/config.php");

$requete = 'SELECT * FROM Evenement ORDER BY date_evenement';
$resultats = $dbh->query($requete);
$tableauEvenement = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Évènements</title>
    <meta name="description" content="Liste des événements et leurs informations.">
    <script src="JS/mustache.min.js"></script>
    <script src="JS/modifierSupprimer.js"></script>
</head>
<body>
    <h1>Tous les Évènements</h1>
    <h2 id="intituleevenement">Sélectionnez un évènement pour plus d'informations :</h2>
    <div id="divevenement"></div>

    <!-- Selecteur d'événements -->
    <form method="GET">
        <select id="selectEvenement" name="idevenement" size="5">
            <?php foreach ($tableauEvenement as $evenement): ?>
                <option value="<?= htmlspecialchars($evenement['id_evenement']) ?>">
                    <?= htmlspecialchars($evenement['titre']) ?> - <?= htmlspecialchars($evenement['date_evenement']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- formulaire pour modifier -->
    <div id="formModifierEvenement" style="display:none;">
        <h2>Modifier l'Évènement</h2>
        <form id="modifierForm">
            <input type="hidden" id="idEvenement" name="idEvenement">
            <label>Titre :</label>
            <input type="text" id="titre" name="titre"><br>
            <label>Description :</label>
            <textarea id="description" name="description"></textarea><br>
            <label>Lieu :</label>
            <input type="text" id="lieu" name="lieu"><br>
            <label>Date :</label>
            <input type="date" id="date_evenement" name="date_evenement"><br>
            <label>URL de l'image :</label>
            <input type="text" id="image" name="image"><br>
            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>

  
    <script id="templateevenement" type="text/html">
        <ul>
            <li>Description: {{description}}</li>
            <li>Date de l'évènement : {{date_evenement}}</li>
            <li>Lieu : {{lieu}}</li>
        </ul>
        <button id="btnModifier" data-id="{{id_evenement}}">Modifier cet évènement</button>
        <button id="btnSupprimer" data-id="{{id_evenement}}">Supprimer cet évènement</button>
    </script>
</body>
</html>
