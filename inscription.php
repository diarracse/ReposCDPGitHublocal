<?php
require_once 'config/config.php';
require_once 'POO/adherent.php';

$message = "";  // Déclaration de la variable pour le message d'erreur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $type_adhesion = $_POST['type_adhesion'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $mdpConfirmation = $_POST['mot_de_passe_confirmation'];

    // Vérifier si les mots de passe correspondent
    if ($mot_de_passe !== $mdpConfirmation) {
        $message = "<div class='alert alert-danger'>Les mots de passe ne correspondent pas.</div>";

    } else {
        try {
            // Vérifier si l'email existe déjà dans la base de données
            $query = $pdo->prepare("SELECT COUNT(*) FROM adherent WHERE email = :email");
            $query->execute([':email' => $email]);
            $count = $query->fetchColumn();

            if ($count > 0) {
                $message = "<div class='alert alert-danger'>Il y a déjà un compte avec cet email, veuillez vous connecter.</div>";

            } else {
                // Enregistrer l'adhérent
                $adherent = new Adherent($nom, $prenom, $email, $type_adhesion, $mot_de_passe);
                $adherent->save($pdo);

                // Redirection vers la page de  connexion pour garder la session active
                header('Location: connexions.php');
                exit(); // Arrête l'exécution pour éviter tout affichage après la redirection
            }
        } catch (Exception $e) {
            // Vérifier si l'erreur est liée à une duplication d'email
            if ($e->getCode() === 23000) {
                $message = "<p>Il y a déjà un compte avec cet email, veuillez vous connecter.</p>";
            } else {
                $message = "<p>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inscrivez-vous et rejoignez VIVRE SAINT-FORTUNAT ! Accédez à votre espace adhérent et découvrez toutes nos activités, événements et services exclusifs." />
    <title>Inscrivez-vous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="images/orange.ico" type="image/x-icon">

</head>

<body>
    <?php include('include/menu.php'); ?>

    <div class="text-center mt-5">

    </div>

    <main class="main-form">
        <div class="form-container">
            <h2>Inscription</h2>

            <p class="moyen-text mb-5">Pour soutenir notre association et participer activement à la vie locale, remplissez ce formulaire pour devenenir adhérent de Vivre Saint Fortunat. </p>

            

            <?php if (!empty($message)) { echo $message; } ?>  <!-- Affichage du message d'erreur -->

            <form action="" method="post">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" required placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" required placeholder="Votre prénom">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Votre email">
                </div>
                <div class="form-group">
                    <label for="type_adhesion">Type d'adhésion</label>
                    <select name="type_adhesion" id="type_adhesion" class="form-control" required>
                    <option value="">Type d'adhésion</option>
                    <option value="individuel">Individuel</option>
                        <option value="famille">Famille</option>
                        <option value="mineur">Mineur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="mot_de_passe" id="password" class="form-control" required placeholder="Votre mot de passe">
                </div>
                <div class="form-group">

                    <label for="confirm-password">Confirmer mot de passe</label>
                    <input type="password" name="mot_de_passe_confirmation" id="confirm-password" class="form-control" required placeholder="Confirmer votre mot de passe">

                </div>
               
               <button type="submit" class="CTA">Envoyer</button>
               <p class="petit-text">Les informations recueillies via ce formulaire sont strictement utilisées pour votre inscription à l'association Vivre Saint Fortunat. Elles ne seront ni partagées, ni revendues.</p>

                <p class="mt-3">Vous avez déjà un compte ? <a href="connexions.php">Se connecter</a></p>
            </form>
        </div>
    </main>

    <?php include('include/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
