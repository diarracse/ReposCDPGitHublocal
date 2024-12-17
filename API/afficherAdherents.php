<?php
// pour se connecter à la base de données
include("../config/config.php");

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$donnees = array();

if (isset($_GET['idadherent'])) {
    $idAdherent = intval($_GET['idadherent']);

       
        $sql = "SELECT id_adherent, nom, prenom, DATE(date_inscription) AS date_inscription, email, type_adhesion 
        FROM Adherent 
        WHERE id_adherent = :id";


        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $idAdherent, PDO::PARAM_INT);
        
        $stmt->execute();

        $adherent = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($adherent) {
            echo json_encode($adherent);
        } else {
            echo json_encode(["error" => "Adhérent non trouvé."]);
        }
   
} else {
    echo json_encode(["error" => "ID de l'adhérent manquant."]);
}




?>


