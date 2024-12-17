<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préférences</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="CSS/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> <!-- Le CSS externe -->

</head>

<body>


    <?php include('include/menu.php'); ?>



    <header>
        <?php include('menu.php'); ?>
    </header>

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto p-4" style="max-width: 600px; border-radius: 20px;">
            <h2 class="text-center mb-4 fw-bold">Sélectionnez vos préférences</h2>
            <div class="row g-4">
                <!-- Carte Culture -->
                <div class="col-6">
                    <div class="case-pref shadow-sm text-center" data-selected="false">
                        <i class="fas fa-globe fs-2 mb-2"></i>
                        <p class="fw-bold mb-0">Culture</p>
                    </div>
                </div>
                <!-- Carte Musique -->
                <div class="col-6">
                    <div class="case-pref shadow-sm text-center" data-selected="false">
                        <i class="fas fa-music fs-2 mb-2"></i>
                        <p class="fw-bold mb-0">Musique</p>
                    </div>
                </div>
                <!-- Carte Découverte -->
                <div class="col-6">
                    <div class="case-pref shadow-sm text-center" data-selected="false">
                        <i class="fas fa-search fs-2 mb-2"></i>
                        <p class="fw-bold mb-0">Découverte</p>
                    </div>
                </div>
                <!-- Carte Randonnée -->
                <div class="col-6">
                    <div class="case-pref shadow-sm text-center" data-selected="false">
                        <i class="fas fa-hiking fs-2 mb-2"></i>
                        <p class="fw-bold mb-0">Randonnée</p>
                    </div>
                </div>
                <!-- Carte Patrimoine -->
                <div class="col-12">
                    <div class="case-pref shadow-sm text-center" data-selected="false">
                        <i class="fas fa-landmark fs-2 mb-2"></i>
                        <p class="fw-bold mb-0">Patrimoine</p>
                    </div>
                </div>
            </div>
            <!-- Bouton Valider -->
            <div class="text-center mt-4">
                <button class="btn btn-outline-pref px-4 py-2 fw-bold">Valider</button>
            </div>
        </div>
    </div>


    <?php include('include/footer.php'); ?>

    <!-- Script JS -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const preferenceCards = document.querySelectorAll(".case-pref");


    <script src="JS/preference.js"></script>
</body>


</html>

<footer>
    <?php include('footer.php'); ?>
</footer>
</html>

