<?php

include('config/config.php');

// variable pour récupérer la date actuelle
$date_actuelle = date('Y-m-d');

// récupérer le type d'event sélectionné si disponible
$nom_type = isset($_GET['nom_type']) ? $_GET['nom_type'] : '';

// requête pour récupérer les événements
$requete = 'SELECT Evenement.*, TypeEvenement.nom_type AS type_evenement 
            FROM Evenement 
            INNER JOIN TypeEvenement ON Evenement.id_type = TypeEvenement.id_type 
            WHERE 1=1';

if (isset($_GET['filtrer']) && $_GET['filtrer'] == 'passes') {
    $requete .= " AND date_evenement < CURDATE()"; // afficher les évènements passés
} elseif (isset($_GET['filtrer']) && $_GET['filtrer'] == 'avenir') {
    $requete .= " AND date_evenement >= CURDATE()"; //afficher les évènements à venir
}

// Ajouter un filtre pour le type d'événement si un type est sélectionné
if (!empty($nom_type)) {
    $requete .= " AND TypeEvenement.nom_type = '$nom_type'"; // Filtrer par type
}


$requete .= ' ORDER BY date_evenement ASC';


$resultats = $pdo->query($requete);
$evenements = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// récupérer tous les types d'événements pour le select
$requete_types = 'SELECT nom_type FROM TypeEvenement';
$resultats_types = $pdo->query($requete_types);
$typesEvenement = $resultats_types->fetchAll(PDO::FETCH_ASSOC);
$resultats_types->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Événements</title>
    <link rel="shortcut icon" href="images/orange.ico" type="image/x-icon">

</head>

<body>

    <?php include('include/menu.php'); ?>

    <div class="container my-5">
        <h1 class="text-center mb-4 fw-bold">Évènements</h1>
        <p class="text-center">Découvrez tous les évènements organisés par l’association Vivre Saint-Fortunat</p>
    </div>

    <div class="container d-md-flex align-items-center justify-content-between">

        <div class="w-100">
            <a href="?filtrer=avenir" class="CTA-events me-2">A venir</a>
            <a href="?filtrer=passes" class="CTA-events me-2">Passés</a>
            <a href="evenements.php" class="CTA-events-annule">X</a>
        </div>

        <form method="get">
            <select id="nom_type" name="nom_type" class="CTA-events px-4 my-4" onchange="this.form.submit()">
                <option value="" disabled selected>Choisir un type existant</option>
                <?php
                foreach ($typesEvenement as $type) {
                    echo "<option value=\"" . $type['nom_type'] . "\"";
                    if (isset($_GET['nom_type']) && $_GET['nom_type'] == $type['nom_type']) {
                        echo " selected";
                    }
                    echo ">" . $type['nom_type'] . "</option>";
                }
                ?>
            </select>
        </form>

    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($evenements as $evenement) : ?>

                <div class="col-md-6 col-12 my-4 px-4">
                    <a class="text-decoration-none text-dark" href="description_evenement.php?id_evenement=<?php echo $evenement['id_evenement'] ?>">
                        <h2><?php echo $evenement['titre'] ?></h2>
                        <p class="p-orange">Date de l'évènement <?php echo date("d/m/Y", strtotime($evenement['date_evenement'])); ?></p>
                        <img class="w-100 img-evenement shadow" src="images/evenement/<?php echo $evenement['image'] ?>" alt="">
                        <p class="mt-4 truncate"> <?php echo $evenement['description'] ?></p>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <?php include('include/footer.php'); ?>

</body>

</html>