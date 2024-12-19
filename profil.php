<?php
include("config/config.php");

// Démarrer la session
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: connexions.php");
    exit;
}

// déconnexion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();
    header("Location: connexions.php");
    exit();
}

$utilisateur = $_SESSION['utilisateur'];

$requete = "SELECT * FROM Participation JOIN Evenement ON Participation.id_evenement = Evenement.id_evenement JOIN Adherent ON Participation.id_adherent = Adherent.id_adherent WHERE adherent.id_adherent = $_SESSION[id_adherent]";
$resultats = $pdo->query($requete);
$participations = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="images/orange.ico" type="image/x-icon">

    <title>Vivre Saint-Fortunat</title>
</head>

<body>
    <?php include('include/menu.php'); ?>
    <div class="col-8 offset-2 my-5 shadow p-5 rounded-4">
        <div class="text-center">
            <div class="w-25 mx-auto">
                <img src="images/profil_orange.png" alt="Votre Profil" class="w-50">
            </div>



            <ul class="list-group list-group-light text-start mt-4 text-profil">
                <li class="list-group-item"><strong class="text-profil-orange"> Nom :</strong> <?php echo "" . $_SESSION['nom']; ?></li>
                <li class="list-group-item"><strong class="text-profil-orange">Prénom :</strong> <?php echo "" . $_SESSION['prenom']; ?></li>
                <li class="list-group-item"><strong class="text-profil-orange">Email :</strong> <?php echo "" . $_SESSION['utilisateur']; ?></li>
                <li class="list-group-item"><strong class="text-profil-orange">Type d'adhésion :</strong> <?php echo "" . $_SESSION['type_adhesion']; ?></li>
                <li class="list-group-item"><strong class="text-profil-orange">Date d'inscription :</strong> <?php echo "" . $_SESSION['date_inscription']; ?></li>
            </ul>

            <div class="text-start mt-4">
                <h2 class="mb-4">Vos participations aux évènements</h2>
                <?php foreach ($participations as $participation) : ?>
                    <div class="text-start">
                        <p>Vous participez à l'évènement : <?php echo $participation['titre']; ?></p>
                        <p>Le : <?php echo $participation['date_evenement']; ?></p>
                    </div>
            </div>
        <?php endforeach; ?>





        <!-- formulaire pour se déconnecter -->
        <form action="" method="POST" class="text-center mt-4">
            <button type="submit" name="logout" class="CTA">Se déconnecter</button>
        </form>
        </div>
    </div>
    <?php include('include/footer.php'); ?>


    <script src="JS/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>