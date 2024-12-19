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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Vivre Saint-Fortunat</title>
</head>
<body>
    <?php include('include/menu.php'); ?>
    <div class="col-8 offset-2 my-5 shadow p-5 rounded-4">
        <div class="text-center">
            <div class="w-25 mx-auto">
                <img src="images/profil_orange.png" alt="Votre Profil" class="w-50">
            </div>



            <ul class="list-group list-group-light text-start mt-4 text-profile">
                <li class="list-group-item">Nom : <?php echo "" . $_SESSION['nom']; ?></li>
                <li class="list-group-item">Prénom :  <?php echo "" . $_SESSION['prenom']; ?></li>
                <li class="list-group-item">Email : <?php echo "" . $_SESSION['utilisateur']; ?></li>
                <li class="list-group-item">Type d'adhésion : <?php echo "" . $_SESSION['type_adhesion']; ?></li>
                <li class="list-group-item">Date d'inscription : <?php echo "" . $_SESSION['date_inscription']; ?></li>
            </ul>
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
