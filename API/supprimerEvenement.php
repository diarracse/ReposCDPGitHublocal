<?php
include("../config/config.php");

try {


    if (isset($_POST['idevenement'])) {
        $idEvenement = intval($_POST['idevenement']);
        $sql = "DELETE FROM Evenement WHERE id_evenement = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $idEvenement, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Évènement supprimé."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erreur lors de la suppression."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "ID de l'évènement manquant."]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Erreur : " . $e->getMessage()]);
}
?>
