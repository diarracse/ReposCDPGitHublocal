<?php
include("config/config.php");
require_once 'POO/TypeEvenement.php';
require_once 'POO/Evenement.php';
session_start();

// Vérifier si l'utilisateur a été redirigé
if (!isset($_SESSION['redirige']) || $_SESSION['redirige'] !== true) {
    // Si la variable n'existe pas ou n'est pas correcte, rediriger l'utilisateur vers une autre page
    header("Location: acces_refuse.php"); // ou une page de connexion, ou une autre page de votre choix
    exit();
}

// Si l'utilisateur a été redirigé correctement, supprimer la variable de session pour éviter des accès ultérieurs
unset($_SESSION['redirige']);




// requête pour les évènements
$requete = 'SELECT * FROM Evenement ORDER BY date_evenement DESC';
$resultats = $pdo->query($requete);
$tableauEvenement = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// requête afficher les adhérents
$requete = 'SELECT * FROM Adherent ORDER BY nom, prenom';
$resultats = $pdo->query($requete);
$tableauAdherent = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

$nbAdherent = count($tableauAdherent);


// charger les types d'événements
$typesRequete = 'SELECT nom_type FROM TypeEvenement';
$resultats = $pdo->query($typesRequete);
$typesEvenement = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();


// Vvariable message erreur
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = isset($_POST['new_titre']) ? $_POST['new_titre'] : '';
    $description = isset($_POST['new_description']) ? $_POST['new_description'] : '';
    $lieu = isset($_POST['new_lieu']) ? $_POST['new_lieu'] : '';
    $nom_type = isset($_POST['new_nom_type']) ? $_POST['new_nom_type'] : '';
    $date_evenement = isset($_POST['new_date_evenement']) ? $_POST['new_date_evenement'] : '';
    $image = isset($_FILES['new_image']) ? $_FILES['new_image'] : '';

    // gestion des nouveaux types d'évènements
    $nom_type = isset($_POST['nom_type']) ? $_POST['nom_type'] : '';
    $nouveau_type = isset($_POST['nouveau_type']) ? $_POST['nouveau_type'] : '';
    $nom_type = !empty($nouveau_type) ? $nouveau_type : $nom_type;


    if ($titre && $description && $lieu && $nom_type && $date_evenement && $image) {
        try {
            $dossier = 'images/evenement';
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

            // renommer le fichier pour supprimer les caractères speciaux
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

            // crer ou ajouter un nouveau type d'évènement
            $typeEvenement = new TypeEvenement($nom_type);
            $id_type = $typeEvenement->getIdOrCreate($pdo);

            // ajout de l'évènement dans la bdd
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
    <script src="JS/AjoutEvenement.js"></script>
    <title>Page Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/mustache.min.js"></script>
    <script src="JS/script2.js"></script>
    <script src="JS/modifierSupprimer.js"></script>

</head>

<body>
    <?php include('include/menu.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div id="formEvenement" class="container p-5 my-5 shadow rounded-5">
                    <h2 class="text-center fw-bold mb-4">Tous les évènements</h2>
                    <p id="intituleevenement" class="d-flex flex-column align-items-center">Sélectionnez un évènement pour plus d'informations :</p>
                    <div id="divevenement"></div>

                    <!-- Selecteur d'événements -->
                    <form method="GET">
                        <select id="selectEvenement" name="idevenement" size="5" class="form-control rounded-4 mx-auto text-center">
                            <?php foreach ($tableauEvenement as $evenement): ?>
                                <option value="<?= htmlspecialchars($evenement['id_evenement']) ?>">
                                    <?= htmlspecialchars($evenement['titre']) ?> - <?= htmlspecialchars($evenement['date_evenement']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </form>

                    <!-- formulaire pour modifier -->
                    <div id="formModifierEvenement">
                        <h2 class="text-center fw-bold mt-4 mb-4">Modifier l'évènement</h2>
                        <form id="modifierForm">
                            <input type="hidden" id="idEvenement" name="idEvenement">
                            <input type="text" class="form-control rounded-4 mx-auto" id="titre" name="titre" placeholder="Nom de l'évènement"><br>
                            <textarea class="form-control rounded-4 mx-auto" id="description" name="description" placeholder="Description"></textarea><br>
                            <input type="text" class="form-control rounded-4 mx-auto" id="lieu" name="lieu" placeholder="Lieu"><br>
                            <input type="date" class="form-control rounded-4 mx-auto" id="date_evenement" name="date_evenement" placeholder="Date de l'évènement"><br>
                            <input type="text" class="form-control rounded-4 mx-auto" id="image" name="image" placeholder="URL de l'image"><br>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="CTA">Enregistrer les modifications</button>
                            </div>
                        </form>
                    </div>

                    <script id="templateevenement" type="text/html">
                        <ul class="list-unstyled text-center">
                            <li>Description: {{description}}</li>
                            <li>Date de l'évènement : {{date_evenement}}</li>
                            <li>Lieu : {{lieu}}</li>
                        </ul>

                        <div class="d-flex justify-content-center">
                            <button id="btnModifier" class="CTA me-3" data-id="{{id_evenement}}">Modifier</button>
                            <button id="btnSupprimer" class="CTA" data-id="{{id_evenement}}">Supprimer</button>
                        </div>
                    </script>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div id="formEvenement" class="container p-5 my-5 shadow rounded-5">
                    <h2 class="text-center fw-bold mb-4">Liste des adhérents</h2>
                    <p id="intituleadherent" class="d-flex flex-column align-items-center">Sélectionnez un adhérent pour plus d'informations :</p>
                    <div id="divadherent"></div>

                    <form method="GET">
                        <select id="selectAdherent" name="idadherent" size="5" class="form-control rounded-4 text-center">
                            <?php
                            // boucle pour afficher chaque infos en fonction de l'id
                            foreach ($tableauAdherent as $adherent) {
                                $nom = htmlspecialchars($adherent["nom"]);
                                $prenom = htmlspecialchars($adherent["prenom"]);
                                $idAdherent = htmlspecialchars($adherent["id_adherent"]);
                                echo "<option value=\"$idAdherent\">$nom $prenom</option>\n";
                            }
                            ?>
                        </select>
                    </form>

                    <!-- template Mustache -->
                    <!-- infos qui s'affichent en haut -->

                    <script id="templateadherent" type="text/html">
                        <div class="d-flex flex-column align-items-center">
                            <ul class="list-unstyled text-center">
                                <li>Date d'inscription : {{date_inscription}}</li>
                                <li>Email : {{email}}</li>
                                <li>Type d'adhésion : {{type_adhesion}}</li>
                            </ul>

                            <div class="d-flex justify-content-center">
                                <button id="btnSupprimer" class="CTA" data-id="{{id_adherent}}">Supprimer</button>
                            </div>
                        </div>
                    </script>
                </div>
            </div>
        </div>
    </div>


    <div class="container ">
        <!-- afficher le message d'erreur -->
        <?php if (!empty($message)) {
            echo $message;
        } ?>

        <div class="row">
            <!-- Formulaire d'ajout d'évènement -->
            <div class="col-lg-6  offset-lg-3 col-md-8 offset-md-2 col-12 accordion">
                <div class="container p-5 my-5 shadow rounded-5 accordion-item">
                    <h2 class="text-center fw-bold mb-4 accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Ajouter un évènement</button></h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <form action="" method="post" enctype="multipart/form-data" class="accordion-body">
                            <div class="mb-3">
                                <input type="text" name="new_titre" class="form-control rounded-4" placeholder="Titre de l'évènement" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="new_description" class="form-control rounded-4" placeholder="Description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="new_lieu" class="form-control rounded-4" placeholder="Lieu" required>
                            </div>
                            <div class="form-group">
                                <label for="nom_type"></label>
                                <select id="nom_type" name="nom_type" class="form-control rounded-4 rounded-4">
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
                                <input type="text" id="nouveau_type" name="nouveau_type" class="form-control rounded-4 rounded-4" placeholder="Nouveau type d'évènement">
                            </div>
                            <div class="mb-3">
                                <input type="date" name="new_date_evenement" class="form-control rounded-4" required>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="new_image" class="form-control rounded-4" accept="image/*" required>
                            </div>
                            <button type="submit" class="CTA">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('include/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>