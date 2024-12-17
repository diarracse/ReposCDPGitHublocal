<?php
// pour se connecter à la base de données
include("../config/config.php");



try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $response = array();

    if (isset($_POST['idadherent'])) {
        $idAdherent = intval($_POST['idadherent']);

        $sql = "DELETE FROM Adherent WHERE id_adherent = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $idAdherent, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $response['status'] = "success";
            $response['message'] = "Adhérent supprimé.";
        } else {
            $response['status'] = "error";
            $response['message'] = "Erreur lors de la suppression.";
        }
    } else {
        $response['status'] = "error";
        $response['message'] = "ID de l'adhérent manquant.";
    }
} catch (PDOException $e) {
    $response['status'] = "error";
    $response['message'] = "Erreur : " . $e->getMessage();
}


// encodage au format JSON 
$responseJson = json_encode($response, JSON_HEX_APOS);

// remplacement des \\n qui peuvent causer des erreurs en JavaScript 
$responseJson = str_replace("\\n", " ", $responseJson);

// on écrit les données
echo $responseJson;
?>
