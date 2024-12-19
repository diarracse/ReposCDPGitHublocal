<?php
include("config/config.php");

// Démarrer la session
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: connexion.php");
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
    <title>Profil Adhérent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('include/menu.php'); ?>
    <div class="profil-container">
        <div class="profil-card shadow-lg p-4">
            <div class="text-center mb-4">
                <img src="images/profil-orange.png" alt="Votre Profil" class="profil-title-img">
            </div>
            <div class="profil-info">
                <p><span class="profil-label">Nom :</span> <!-- ajouter le nom à partir de la bdd et avec l'id de l'adhrent connecté --></p>
                <p><span class="profil-label">Prénom :</span></p>
                <p><span class="profil-label">Email :</span></p>
                <p><span class="profil-label">Type d'adhésion :</span></p>
                <p><span class="profil-label">Date d'inscription :</span></p>
                <p><span class="profil-label">Préférences :</span></p>
            </div>
            <!-- formulaire pour se déconnecter -->
            <form action="" method="POST" class="text-center mt-4">
                <button type="submit" name="logout" class="CTA">Se déconnecter</button>
            </form>
        </div>
    </div>
    <?php include('include/footer.php'); ?>
</body>
</html>
