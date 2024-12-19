<?php
session_start();
include("config/config.php");


//connexion

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
        $email = $_POST['email'];
        $motdepasse = $_POST['mot_de_passe'];

        try {
            // connexion à la base de données
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            // vérification dans la table admin
            $requeteAdmin = $bdd->prepare("SELECT * FROM Admin WHERE email = ?");
            $requeteAdmin->execute([$email]);
            $admin = $requeteAdmin->fetch();

            // vérification du mdp pour l'admin
            if ($admin && password_verify($motdepasse, $admin['mot_de_passe'])) {
              
                $_SESSION['admin'] = $admin['email']; 
                $_SESSION['redirige'] = true;
                header('Location: admin.php'); // redirection vers la page admin
                exit();
            }

            // vérification dans la table adherent
            $requeteAdherent = $bdd->prepare("SELECT * FROM Adherent WHERE email = ?");
            $requeteAdherent->execute([$email]);
            $utilisateur = $requeteAdherent->fetch();

            // vérification du mot de passe pour l'utilisateur
            if ($utilisateur && password_verify($motdepasse, $utilisateur['mot_de_passe'])) {
                $_SESSION['utilisateur'] = $utilisateur['email'];
                $_SESSION['nom'] = $utilisateur['nom'];
                $_SESSION['prenom'] = $utilisateur['prenom'];
                $_SESSION['type_adhesion'] = $utilisateur['type_adhesion'];
                $_SESSION['date_inscription'] = $utilisateur['date_inscription'];


    
                header('Location: index.php'); // redirection vers la page utilisateur
                exit();
            } else {
                $message = "email ou mot de passe incorrect.";
            }
        } catch (Exception $e) {
            $message = "erreur : " . $e->getMessage();
        }
    } else {
        $message = "veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<?php include('include/menu.php'); ?>
<main class="main-form">
    <div class="form-container">
        <h2>Connexion</h2>
        <?php if (!empty($message)): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Votre email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="mot_de_passe" class="form-control" required placeholder="Votre mot de passe">
            </div>
            <button type="submit" class="CTA">Se connecter</button>
            <p class="mt-3">Vous n'avez pas de compte ? <a href="inscription.php">S'inscrire</a></p>
        </form>
    </div>
</main>
<?php include('include/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>