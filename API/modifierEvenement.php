<?php
// Inclure la configuration pour la connexion à la base de données
include("../config/config.php");

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Initialiser la réponse
    $response = array();

    // Vérifier si toutes les données nécessaires sont envoyées via POST
    if (
        isset($_POST['idEvenement']) &&
        isset($_POST['titre']) &&
        isset($_POST['description']) &&
        isset($_POST['lieu']) &&
        isset($_POST['date_evenement']) &&
        isset($_POST['image'])
    ) {
        // Récupérer les données du formulaire
        $idEvenement = intval($_POST['idEvenement']);
        $titre = trim($_POST['titre']);
        $description = trim($_POST['description']);
        $lieu = trim($_POST['lieu']);
        $date_evenement = $_POST['date_evenement'];
        $image = trim($_POST['image']);

        // Requête SQL pour mettre à jour l'événement
        $sql = "UPDATE Evenement 
                SET titre = :titre, 
                    description = :description, 
                    lieu = :lieu, 
                    date_evenement = :date_evenement, 
                    image = :image 
                WHERE id_evenement = :idEvenement";

        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':lieu', $lieu, PDO::PARAM_STR);
        $stmt->bindParam(':date_evenement', $date_evenement, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':idEvenement', $idEvenement, PDO::PARAM_INT);

        // Exécuter la requête
        if ($stmt->execute()) {
            $response['status'] = "success";
            $response['message'] = "L'évènement a été mis à jour .";
        } else {
            $response['status'] = "error";
            $response['message'] = "Erreur lors de la mise à jour de l'évènement.";
        }
    } else {
        $response['status'] = "error";
        $response['message'] = "Toutes les données du formulaire ne sont pas fournies.";
    }
} catch (PDOException $e) {
    $response['status'] = "error";
    $response['message'] = "Erreur : " . $e->getMessage();
}

// Retourner la réponse en JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
