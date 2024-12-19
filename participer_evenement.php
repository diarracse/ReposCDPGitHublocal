<?php
include("config/config.php");
session_start();

// Vérifiez si l'utilisateur est connecté et si l'ID de l'événement est fourni.
if (!isset($_SESSION['id_adherent'])) {
    die("Vous devez être connecté pour participer à un événement.");
}
else {


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
