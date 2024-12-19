<?php
class Evenement {
    private $titre;
    private $description;
    private $lieu;
    private $id_type;
    private $date_evenement;
    private $image_path;

    public function __construct($new_titre, $new_description, $new_lieu, $new_id_type, $new_date_evenement, $new_image_path) {
        $this->titre = $new_titre;
        $this->description = $new_description;
        $this->lieu = $new_lieu;
        $this->id_type = $new_id_type;
        $this->date_evenement = $new_date_evenement;
        $this->image_path = $new_image_path;
    }

    public function save($pdo) {
        $stmt = $pdo->prepare(
            "INSERT INTO Evenement (titre, description, lieu, id_type, date_evenement, image)
             VALUES (:titre, :description, :lieu, :id_type, :date_evenement, :image)"
        );
        $stmt->execute([
            ':titre' => $this->titre,
            ':description' => $this->description,
            ':lieu' => $this->lieu,
            ':id_type' => $this->id_type,
            ':date_evenement' => $this->date_evenement,
            ':image' => $this->image_path,
        ]);
    }
}

?>
