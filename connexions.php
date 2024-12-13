<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="formulaire.css">
</head>

<body>

<div class="form-container">
    <h2>Connexion</h2>
    <form>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" required placeholder="Votre email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" class="form-control" required placeholder="Votre mot de passe">
        </div>
        <button type="submit" class="btn-primary">Se connecter</button>
        <p class="mt-3">Vous n'avez pas de compte ? <a href="inscription.php">S'inscrire</a></p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
