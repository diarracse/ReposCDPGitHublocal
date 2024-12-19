<?php
class TypeEvenement {
    private $nom_type;

    public function __construct($new_nom_type) {
        $this->nom_type = $new_nom_type;
    }

    public function getIdOrCreate($pdo) {
        // vérifier si le type existe déjà
        $stmt = $pdo->prepare("SELECT id_type FROM TypeEvenement WHERE nom_type = :nom_type");
        $stmt->execute([':nom_type' => $this->nom_type]);
        $typeEvenement = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$typeEvenement) {
            // ajouter le type d'événement s'il n'existe pas
            $stmt = $pdo->prepare("INSERT INTO TypeEvenement (nom_type) VALUES (:nom_type)");
            $stmt->execute([':nom_type' => $this->nom_type]);
            return $pdo->lastInsertId();
        }

        return $typeEvenement['id_type'];
    }
}

?>
