<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/AjoutEvenement.js"></script>
    <title>Ajouter un Événement</title>
</head>
<body>
    <h1>Ajouter un Événement</h1>
    <form id="formEvenement">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>

        <label for="lieu">Lieu</label>
        <input type="text" id="lieu" name="lieu" required>

        <label for="nom_type">Type d'événement</label>
        <input type="text" id="nom_type" name="nom_type" required>

        <label for="date_evenement">Date de l'événement</label>
        <input type="date" id="date_evenement" name="date_evenement" required>

        <label for="image">URL de l'image</label>
        <input type="text" id="image" name="image" required>

        <button type="submit">Ajouter l'Événement</button>
    </form>

</body>
</html>
