<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/formulaire.css">

</head>

<body>
    <?php include('menu.php'); ?>

    <main class="main-form">
        <div class="form-container w-75">

            <h2>Nous contacter</h2>
            <form>
                <div class="d-flex w-100 gap-4">
                    <div class="form-group w-50">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" class="form-control" required placeholder="Votre nom">
                    </div>
                    <div class="form-group w-50">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" class="form-control" required placeholder="Votre prénom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="objet">Objet</label>
                    <input type="objet" id="objet" class="form-control" required placeholder="Votre objet">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea type="textarea" id="message" class="form-control" required placeholder="Votre message"></textarea>
                </div>
                <button type="submit" class="btn-primary">Envoyer</button>
                <p class="mt-3">Vous avez déjà un compte ? <a href="connexions.php">Se connecter</a></p>
            </form>

        </div>
    </main>


    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
</body>

</html>