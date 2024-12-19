<?php
include("config/config.php");
require_once 'POO/TypeEvenement.php';
require_once 'POO/Evenement.php';

// Récupérer les événements
$requete = 'SELECT * FROM Evenement ORDER BY date_evenement';
$resultats = $pdo->query($requete);
$tableauEvenement = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// Récupérer les types d'événements
$requete = 'SELECT * FROM TypeEvenement ORDER BY nom_type';
$resultats = $pdo->query($requete);
$typesEvenement = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// Récupérer les adhérents
$requete = 'SELECT * FROM Adherent ORDER BY nom, prenom';
$resultats = $pdo->query($requete);
$tableauAdherent = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

$nbAdherent = count($tableauAdherent);

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Utilisation des nouveaux noms de champs du formulaire
$titre = isset($_POST['new_titre']) ? $_POST['new_titre'] : '';
$description = isset($_POST['new_description']) ? $_POST['new_description'] : '';
$lieu = isset($_POST['new_lieu']) ? $_POST['new_lieu'] : '';
$nom_type = isset($_POST['new_nom_type']) ? $_POST['new_nom_type'] : '';
$date_evenement = isset($_POST['new_date_evenement']) ? $_POST['new_date_evenement'] : '';
$image = isset($_FILES['new_image']) ? $_FILES['new_image'] : '';

// gestion des types d'évènements
$nom_type = isset($_POST['nom_type']) ? $_POST['nom_type'] : '';
$nouveau_type = isset($_POST['nouveau_type']) ? $_POST['nouveau_type'] : '';
$nom_type = !empty($nouveau_type) ? $nouveau_type : $nom_type;


    if ($titre && $description && $lieu && $nom_type && $date_evenement && $image) {
        try {
            $dossier = 'images/';
            $fichier = basename($image['name']);
            $taille_maxi = 1000000;
            $taille = filesize($image['tmp_name']);
            $extensions_valides = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $extension_fichier = strtolower(pathinfo($fichier, PATHINFO_EXTENSION));

            if ($taille > $taille_maxi) {
                throw new Exception("La taille de l'image ne doit pas dépasser 1 Mo.");
            }

            if (!in_array($extension_fichier, $extensions_valides)) {
                throw new Exception("Format de fichier non valide. Seuls les formats JPG, JPEG, PNG, GIF et WEBP sont acceptés.");
            }

            // Renommer le fichier pour supprimer les caractères spéciaux
            $fichier = strtr(
                $fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
            );
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            $chemin = $dossier . $fichier;
            if (!move_uploaded_file($image['tmp_name'], $chemin)) {
                throw new Exception("Échec de l'ajout de l'image.");
            }

            // Création ou récupération du type d'événement
            $typeEvenement = new TypeEvenement($nom_type);
            $id_type = $typeEvenement->getIdOrCreate($pdo);

            // Sauvegarde de l'événement dans la base de données
            $evenement = new Evenement($titre, $description, $lieu, $id_type, $date_evenement, $chemin);
            $evenement->save($pdo);

            $message = "<div class='alert alert-success'>Événement ajouté avec succès.</div>";
        } catch (Exception $e) {
            $message = "<div class='alert alert-danger'>Erreur : " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        $message = "<div class='alert alert-danger'>Tous les champs sont obligatoires.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/mustache.min.js"></script>
</head>
<body>
    <?php include('include/menu.php'); ?>

    <div class="container my-5">
      
        <?php if (!empty($message)) { echo $message; } ?>

        <div class="row">
            <!-- Formulaire d'ajout d'événement -->
            <div class="col-lg-6">
                <div class="shadow p-4 rounded bg-light">
                    <h2 class="text-center mb-3">Ajouter un Événement</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" name="new_titre" class="form-control" placeholder="Titre de l'événement" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="new_description" class="form-control" placeholder="Description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="new_lieu" class="form-control" placeholder="Lieu" required>
                        </div>
                        <div class="form-group">
                            <label for="nom_type"></label>
                            <select id="nom_type" name="nom_type" class="form-control rounded-4">
                                <option value="" disabled selected>Choisir un type existant</option>
                                <?php
                                foreach ($typesEvenement as $type) {
                                    echo "<option value=\"" . htmlspecialchars($type['nom_type']) . "\">" . htmlspecialchars($type['nom_type']) . "</option>";
                                }
                                ?>
                            </select>
                            <p class="form-text text-muted">Ou ajoutez un nouveau type ci-dessous</p>
                        </div>
                        <div class="form-group">
                            <label for="nouveau_type"></label>
                            <input type="text" id="nouveau_type" name="nouveau_type" class="form-control rounded-4" placeholder="Nouveau type d'événement">
                        </div>
                        <div class="mb-3">
                            <input type="date" name="new_date_evenement" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="new_image" class="form-control" accept="image/*" required>
                        </div>
                        <button type="submit" class="CTA">Ajouter</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    

    <?php include('include/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
