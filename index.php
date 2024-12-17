<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Vivre Saint-Fortunat</title>
</head>

<body>



    <header>
        <img class="position-absolute z-3 top-50 start-50 translate-middle w-75 px-md-5" src="images/logo-entier-blanc.png" alt="logo-entier-blanc">


        <a href="connexion.php">
            <div class="d-flex justify-content-end">
                <div class="position-absolute z-3 d-flex align-items-center m-3">
                    <p class="mb-0 me-3 d-md-block d-none text-light">Se connecter</p>
                    <img class="photo-profil" src="images/profil.png" alt="">
                </div>
            </div>
        </a>



        <nav class="navbar z-3 position-absolute fixed-bottom w-100 d-md-block d-none">
            <div class="container justify-content-center">
                <a class="navbar-brand text-light mx-4" href="index.php">Accueil</a>
                <a class="navbar-brand text-light mx-4" href="adhesion.php">Adhésion</a>
                <a class="navbar-brand text-light mx-4" href="evenement.php">Évènements</a>
                <a class="navbar-brand text-light mx-4" href="contact.php">Contact</a>
            </div>
        </nav>

        <?php include 'menu-telephone.php'; ?>





        <div class="image-fond position-relative z-2">
        </div>

        <div class="z-1 fixed-top degrade-nav  d-md-block d-none">
        </div>

    </header>

    <section class="container my-5">

        <h2 class="text-center">Venez découvrir l'association <br> VIVRE SAINT-FORTUNAT</h2>

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
                <img class="w-100" src="images/Ville-presentation.png" alt="">
            </div>

        </div>

    </section>

    <section class="infos">

        <div class="container py-5">

            <div class="row mt-5">

                <div class="col-md-4 d-flex flex-column align-items-center mb-5">
                    <img class="mb-4" src="images/annee.png" alt="">
                    <p class="text-light fs-3 fw-bold">22 ans</p>
                    <p class="text-light">Années d'existence</p>
                </div>

                <div class="col-md-4 d-flex flex-column align-items-center mb-5">
                    <img class="mb-4" src="images/people.png" alt="">
                    <p class="text-light fs-3 fw-bold">100+</p>
                    <p class="text-light">Adhérents</p>
                </div>

                <div class="col-md-4 d-flex flex-column align-items-center mb-5">
                    <img class="mb-4" src="images/events.png" alt="">
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
            <a class="text-orange mb-4" href="evenement.php">
                <p class="text-end">Voir tout ></p>
            </a>


        </div>

        <div id="carouselExampleIndicators" class="carousel slide container">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/image-accueil.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item active">
                    <img src="images/image-accueil.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item active">
                    <img src="images/image-accueil.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="d-flex justify-content-center">
            <a class="mt-5 mb-3 CTA" href="description_evenement.php?id=<?php echo $evenement['id_evenement']; ?> ">Découvrir l'évènement</a>
        </div>
    </section>



    <?php include 'footer.php'; ?>


    </section>

    <script src="JS/navbar.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>