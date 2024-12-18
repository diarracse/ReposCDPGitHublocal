<?php

include('config/config.php');

$requete = 'SELECT * FROM Evenement ORDER BY date_evenement DESC';
$resultats = $pdo->query($requete);
$evenements = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php include('include/menu.php'); ?>

    <div class="container my-5">
        <h1 class="text-center">Évènements</h1>
        <p class="text-center">Découvrez tous les évènements organisées par l’association Vivre Saint-Fortunat</p>
    </div>

    <div class="container d-flex justify-content-between">

        <div class="d-md-flex w-75 mb-lg-5">

            <button class="CTA-events me-2">A venir</button>
            <button class="CTA-events me-2">Passés</button>
            <button class="CTA-events-annule">X</button>
        </div>



        <div>
            <select class="CTA-events px-4" name="" id="">
                <option value="">Tous les évènements</option>
                <option value="">Culture</option>
                <option value="">Musique</option>
                <option value="">Découverte</option>
                <option value="">Randonnée</option>
                <option value="">Patrimoine</option>
            </select>
        </div>

    </div>


    <div class="container">
        <div class="row">
            <?php foreach ($evenements as $evenement) : ?>

                <div class="col-md-6 col-12 my-4 px-4">
                    <a class="text-decoration-none text-dark" href="description-evenement.php?id=<?php echo $evenement['id_evenement'] ?>">
                        <h2><?php echo $evenement['titre'] ?></h2>
                        <p class="p-orange">publié le <?php echo $evenement['date_evenement'] ?></p>
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