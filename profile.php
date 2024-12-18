<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> <!-- Nouveau fichier CSS -->
</head>
<body>
    <?php include('include/menu.php'); ?>
    <div class="profil-container">
    <div class="profil-card shadow-lg p-4">
        <div class="text-center mb-4">
            <img src="images/profil-orange.png" alt="Votre Profil" class="profil-title-img">
        </div>
        <div class="profil-info">
            <p><span class="profil-label">Nom :</span></p>
            <p><span class="profil-label">Prénom :</span></p>
            <p><span class="profil-label">Email :</span></p>
            <p><span class="profil-label">Type d'adhésion :</span></p>
            <p><span class="profil-label">Préférences :</span></p>
        </div>
    </div>
</div>

    <?php include('include/footer.php'); ?>
</body>
</html>
