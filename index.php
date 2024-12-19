<?php
include("config/config.php");
session_start();

unset($_SESSION['redirige']);
unset($_SESSION['message_ajouter']);




$requete = 'SELECT * FROM Evenement WHERE date_evenement >= CURDATE() ORDER BY date_evenement ASC LIMIT 1';
$resultats = $pdo->query($requete);
$evenement_recent = $resultats->fetch(PDO::FETCH_ASSOC);
$resultats->closeCursor();


$requete = 'SELECT * FROM Evenement WHERE date_evenement >= CURDATE() ORDER BY date_evenement ASC LIMIT 2 OFFSET 1';
$resultats = $pdo->query($requete);
$evenements = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/orange.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Vivre Saint-Fortunat</title>
</head>

<body>
    <header>
        <img class="position-absolute z-3 top-50 start-50 translate-middle w-75 px-md-5" src="images/logo-entier-blanc.png" alt="logo-entier-blanc">

        <a href="profil.php">
            <div class="d-flex justify-content-end">
                <div class="position-absolute z-3 d-flex align-items-center m-3">
                    <p class="mb-0 me-3 d-md-block d-none text-light"><?php
                            if (isset($_SESSION['utilisateur'])) {
                                echo "Mon compte";
                            } else {
                                echo "Se connecter";
                            }

                        ?></p>
                    <img class="photo-profil  d-md-block d-none" src="images/profil.png" alt="">
                </div>
            </div>
        </a>

        <nav class="mt-2 navbar z-3 position-absolute fixed-bottom w-100 d-md-block d-none">
            <div class="menu-index container justify-content-center">
                <ul>
                    <li><a href="index.php" class="<?= ($pageActive == 'index.php') ? 'active' : '' ?>">Accueil</a></li>
                    <li><a href="adhesion.php" class="<?= ($pageActive == 'adhesion.php') ? 'active' : '' ?>">Adhésion</a></li>
                    <li><a href="evenements.php" class="<?= ($pageActive == 'evenements.php') ? 'active' : '' ?>">Évènements</a></li>
                    <li><a href="contact.php" class="<?= ($pageActive == 'contact.php') ? 'active' : '' ?>">Contact</a></li>
                </ul>
            </div>
        </nav>

        <?php include('include/menu-telephone.php'); ?>

        <div class="image-fond position-relative z-2">
        </div>

        <div class="z-1 fixed-top position-fixed fond-nav d-md-block d-none">
        </div>
    </header>

    <section class="container my-5">

        <h1 class="text-center">Venez découvrir l'association <br> VIVRE SAINT-FORTUNAT</h1>
        <div class="row mt-5  d-flex flex-wrap-reverse">
            <div class="col-lg-6 mt-lg-0 mt-5">
                <p class="text-justify">VIVRE SAINT-FORTUNAT a pour but la préservation du site de Saint-Fortunat (commune de Saint-Didier) et de son patrimoine ainsi que l’animation du hameau : <br><br>

                    Elle propose des manifestations culturelles telles les Rencontres Musique et Peinture en septembre, la soirée contes des Cabornes en juin mais aussi des rencontres plus conviviales : 8 décembre et la décoration de rues… <br><br>

                    Elle restaure le petit patrimoine de pierres sèches (cabornes), s’implique dans la gestion de la zone verte et agricole et surtout s’intéresse à l’évolution du site en matière d’urbanisme. <br><br>

                    Elle propose des visites du patrimoine local et notamment le Sentier de la Pierre qui évoque le passé carrier de Saint-Fortunat, la visite du site de pierres sèches des Essarts (cabornes) ainsi que la visite de la chapelle classée (14e). <br><br>

                    L’association participe à la vie de Saint-Didier. Par son action elle veut affirmer l’identité du hameau, son passé « carrier » mais aussi son avenir. L’association est ouverte à tous.
                </p>
            </div>
            <div class="col-lg-6">
                <img class="w-100" src="images/accueil/Ville-presentation.png" alt="">
            </div>
        </div>
    </section>

    <section class="infos">
        <div class="container py-5">
            <div class="row mt-5">
                <div class="col-md-4 d-flex flex-column align-items-center mb-5">
                    <img class="mb-4" src="images/accueil/annee.png" alt="">
                    <p class="text-light fs-3 fw-bold">22</p>
                    <p class="text-light">Années d'existence</p>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-center mb-5">
                    <img class="mb-4" src="images/accueil/people.png" alt="">
                    <p class="text-light fs-3 fw-bold">100+</p>
                    <p class="text-light">Adhérents</p>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-center mb-5">
                    <img class="mb-4" src="images/accueil/events.png" alt="">
                    <p class="text-light fs-3 fw-bold">500</p>
                    <p class="text-light">Évènements organisées</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="my-5 CTA-blanc" href="adhesion.php">Nous rejoindre</a>
            </div>
        </div>
    </section>

    <section>
        <div class="d-flex flex-column align-items-center">
            <h2 class="mt-5 mb-0">Évènements</h2>
            <a class="text-orange mb-4" href="evenements.php">
                <p class="text-end">Voir tout ></p>
            </a>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide container">

            <div class="carousel-inner">

                <div class="carousel-item active">

                    <img class="d-block w-100 img-carousel" src="images/evenement/<?php echo $evenement_recent['image'] ?>" alt="image évènement">

                    <div class="d-flex justify-content-center">
                        <a class="CTA-carousel" href="description_evenement.php?id_evenement=<?php echo $evenement_recent['id_evenement']; ?>"> <?php echo $evenement_recent['titre'];?> (Découvrir)</a>
                    </div>
                </div>

                <?php foreach ($evenements as $evenement) : ?>
                    <div class="carousel-item">
                        <img class="d-block w-100 img-carousel" src="images/evenement/<?php echo $evenement['image'] ?>" alt="image évènement">

                        <div class="d-flex justify-content-center">
                            <a class="CTA-carousel" href="description_evenement.php?id_evenement=<?php echo $evenement['id_evenement']; ?>"><?php echo $evenement ['titre']?> (Découvrir)</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="carousel-control-prev mb-5" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next mb-5" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



    </section>

    <?php include('include/footer.php'); ?>

    <script src="JS/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>