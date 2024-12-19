<?php
class Adherent {
    private $nom;
    private $prenom;
    private $email;
    private $type_adhesion;
    private $mot_de_passe;

    public function __construct($nom, $prenom, $email, $type_adhesion, $mot_de_passe) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->type_adhesion = $type_adhesion;
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT); // Hash du mot de passe
    }

    public function save(PDO $pdo) {
        //  requête pour insérer dans la bdd
        $sql = "INSERT INTO Adherent (nom, prenom, email, type_adhesion, mot_de_passe) 
                VALUES (:nom, :prenom, :email, :type_adhesion, :mot_de_passe)";
        $stmt = $pdo->prepare($sql);

        // execution de la requête 
        $stmt->execute([
            ':nom' => $this->nom,
            ':prenom' => $this->prenom,
            ':email' => $this->email,
            ':type_adhesion' => $this->type_adhesion,
            ':mot_de_passe' => $this->mot_de_passe
        ]);
    }
}
