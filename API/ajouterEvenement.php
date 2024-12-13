<?php
include("../config/config.php");

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erreur de connexion : ' . $e->getMessage()]);
    exit;
}

$response = ['status' => 'error', 'message' => 'Requête invalide'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = !empty($_POST['titre']) ? htmlspecialchars($_POST['titre']) : null;
    $description = !empty($_POST['description']) ? htmlspecialchars($_POST['description']) : null;
    $lieu = !empty($_POST['lieu']) ? htmlspecialchars($_POST['lieu']) : null;
    $nom_type = !empty($_POST['nom_type']) ? htmlspecialchars($_POST['nom_type']) : null;
    $date_evenement = !empty($_POST['date_evenement']) ? $_POST['date_evenement'] : null;
    $image = !empty($_POST['image']) ? htmlspecialchars($_POST['image']) : null;

    if ($titre && $description && $lieu && $nom_type && $date_evenement && $image) {
        try {
            // vérifier si ce type d'événement existe déjà
            $requeteType = "SELECT id_type FROM TypeEvenement WHERE nom_type = :nom_type";
            $stmtType = $dbh->prepare($requeteType);
            $stmtType->execute([':nom_type' => $nom_type]);
            $typeEvenement = $stmtType->fetch(PDO::FETCH_ASSOC);

            if (!$typeEvenement) {
                // si il n'existe pas, on ajoute ce nv type avec un nouvel id dans la table TypeEvenement
                $requeteInsertType = "INSERT INTO TypeEvenement (nom_type) VALUES (:nom_type)";
                $stmtInsertType = $dbh->prepare($requeteInsertType);
                $stmtInsertType->execute([':nom_type' => $nom_type]);

                // on récupère l'id du nv type crée
                $id_type = $dbh->lastInsertId();
            } else {
                $id_type = $typeEvenement['id_type'];
            }

            //  on insère le nv Evenement avec son id 
            $requete = "INSERT INTO Evenement (titre, description, lieu, id_type, date_evenement, image) 
                        VALUES (:titre, :description, :lieu, :id_type, :date_evenement, :image)";
            $stmt = $dbh->prepare($requete);
            $stmt->execute([
                ':titre' => $titre,
                ':description' => $description,
                ':lieu' => $lieu,
                ':id_type' => $id_type,
                ':date_evenement' => $date_evenement,
                ':image' => $image
            ]);

            $response = ['status' => 'success', 'message' => 'Évènement ajouté !'];
        } catch (PDOException $e) {
            $response = ['status' => 'error', 'message' => 'Erreur lors de l\'insertion : ' . $e->getMessage()];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Tous les champs sont obligatoires'];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
