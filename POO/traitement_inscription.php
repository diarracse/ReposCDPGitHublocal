<?php
require_once '../config/config.php';
require_once 'adherent.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $type_adhesion = $_POST['type_adhesion'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $mdpConfirmation = $_POST['mot_de_passe_confirmation'];

    // Vérifier si les mots de passe correspondent
    if ($mot_de_passe !== $mdpConfirmation) {
        echo "<p>Les mots de passe ne correspondent pas.</p>";
    } else {
        try {
            // Enregistrer l'adhérent
            $adherent = new Adherent($nom, $prenom, $email, $type_adhesion, $mot_de_passe);
            $adherent->save($pdo);

            // Redirection vers la page de préférences
            header('Location: ../preference.php');
            exit(); // Arrête l'exécution pour éviter tout affichage après la redirection
        } catch (Exception $e) {
            echo "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
}
?>
