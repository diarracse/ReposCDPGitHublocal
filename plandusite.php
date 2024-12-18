<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan du site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> <!-- Nouveau fichier CSS -->
</head>
<style>
      /* Style global spécifique au plan du site */
   .plan-container {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #333;
    margin: 0;
    padding: 0;
}
/* Carte principale */
.plan-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 30px;
    margin: 40px auto;
    max-width: 900px;
}

/* Titre principal */
.plan-title {
    font-family: 'Verdana', sans-serif;
    font-size: 2.5rem;
    color: #e74c3c;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 20px;
}

/* Liste principale */
.plan-list {
    padding-left: 20px;
    list-style-type: none;
}

/* Liens principaux */
.plan-list > li > a {
    font-weight: bold;
    color: #e74c3c;
    text-decoration: none;
    font-size: 1.2rem;
}

.plan-list > li > a:hover {
    text-decoration: underline;
    color: #c0392b;
}

/* Sous-liste */
.plan-sublist {
    margin-left: 20px;
    list-style-type: disc;
}

.plan-sublist li a {
    color: #3498db;
    font-weight: normal;
    font-size: 1rem;
}

.plan-sublist li a:hover {
    text-decoration: underline;
    color: #2980b9;
}
</style>
<header>
<?php include('include/menu.php'); ?> 
</header>
<body class="plan-container">
    
    <div class="plan-card">
        <h1 class="plan-title">Plan du site</h1>
        <ul class="plan-list">
            <li><a href="index.php">Accueil</a></li>
            <ul class="plan-sublist">
                    <li><a href="connexions.php">Page de connexion</a></li>
                    <li><a href="index.php">Page d'Accueil</a></li>
                    <li><a href="adhesion.php">Page d'adhésion</a></li>
                    <li><a href="evenement.php">Page d'événements</a></li>
                    <li><a href="contact.php">Page de contact</a></li>
            </ul>
            <li><a href="adhesion.php">Adhésion</a></li>
            <ul class="plan-sublist">
                    <li><a href="connexions.php">Page de connexion</a></li>
                    <li><a href="index.php">Page d'Accueil</a></li>
                    <li><a href="adhesion.php">Page d'adhésion</a></li>
                    <li><a href="evenement.php">Page d'événements</a></li>
                    <li><a href="contact.php">Page de contact</a></li>
            </ul>
            <li><a href="evenements.php">Événements</a></li>
            <ul class="plan-sublist">
                    <li><a href="connexions.php">Page de connexion</a></li>
                    <li><a href="index.php">Page d'Accueil</a></li>
                    <li><a href="adhesion.php">Page d'adhésion</a></li>
                    <li><a href="evenement.php">Page d'événements</a></li>
                    <li><a href="contact.php">Page de contact</a></li>            </ul>
            <li><a href="contact.php">Contact</a></li>
            <ul class="plan-sublist">
                    <li><a href="connexions.php">Page de connexion</a></li>
                    <li><a href="index.php">Page d'Accueil</a></li>
                    <li><a href="adhesion.php">Page d'adhésion</a></li>
                    <li><a href="evenement.php">Page d'événements</a></li>
                    <li><a href="contact.php">Page de contact</a></li>            </ul>
            <li><a href="inscription.php">Inscription</a></li>
            <ul class="plan-sublist">
                <li><a href="index.php">Page d'Accueil</a></li>
                    <li><a href="adhesion.php">Page d'adhésion</a></li>
                    <li><a href="evenement.php">Page d'événements</a></li>
                    <li><a href="contact.php">Page de contact</a></li>
                    <li><a href="inscription.php">Page d'inscription</a></li>
                    <li><a href="preference.php">Page des préférences</a></li>
                    <li><a href="connexions.php">Page de connexion</a></li>            </ul>
            <li><a href="connexions.php">Connexion</a></li>
            <ul class="plan-sublist">
            <li><a href="index.php">Page d'Accueil</a></li>
                    <li><a href="adhesion.php">Page d'adhésion</a></li>
                    <li><a href="evenement.php">Page d'événements</a></li>
                    <li><a href="contact.php">Page de contact</a></li>
                    <li><a href="inscription.php">Page d'inscription</a></li>
                    <li><a href="connexions.php">Page de connexion</a></li>            
                </ul>
        </ul>
    </div>
        <link rel="stylesheet" href="css/style.css">
        <?php include('include/footer.php'); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
