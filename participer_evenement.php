<?php
include("config/config.php");
session_start();

// Vérifiez si l'utilisateur est connecté et si l'ID de l'événement est fourni.
if (!isset($_SESSION['id_adherent'])) {
    $message = "Vous devez être connecté pour participer à un événement.";
} else {


    if (isset($_GET['id_evenement'])) {
        $id_evenement = $_GET['id_evenement'];
        $id_adherent = $_SESSION['id_adherent'];

        // Vérifiez si l'utilisateur est déjà inscrit à l'événement
        $requete = "SELECT * FROM Participation WHERE id_evenement = $id_evenement AND id_adherent = $id_adherent";
        $resultat = $pdo->query($requete);
        $participation = $resultat->fetch(PDO::FETCH_ASSOC);

        if ($participation) {
            die("Vous êtes déjà inscrit à cet événement.");
        }

        // Ajoutez l'utilisateur à la liste des participants
        $requete = "INSERT INTO Participation (id_evenement, id_adherent) VALUES ($id_evenement, $id_adherent)";
        $pdo->exec($requete);

        // Redirigez l'utilisateur vers la page de l'événement
        header("Location: description_evenement.php?id_evenement=$id_evenement");
    } else {
        die("L'ID de l'événement est requis.");
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="images/orange.ico" type="image/x-icon">

</head>

<body>
    <?php include('include/menu.php'); ?>

    <?php if (isset($message)) : ?>
        <div class="text-center my-5 h-100">
            <h1><?php echo $message; ?></h1>
        </div>
    <?php endif; ?>

    <div class="fixed-bottom">
        <?php include('include/footer.php'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="JS/contact.js"></script>
</body>

</html>