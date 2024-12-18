<?php
// détecter la page active
$pageActive = basename($_SERVER['PHP_SELF']);
?>

<!-- menu -->
<nav class="menu fixed-top d-md-block d-none position-sticky">
    <ul>
        <li><a href="index.php" class="<?= ($pageActive == 'index.php') ? 'active' : '' ?>">Accueil</a></li>
        <li><a href="adhesion.php" class="<?= ($pageActive == 'adhesion.php') ? 'active' : '' ?>">Adhésion</a></li>
        <li><a href="evenements.php" class="<?= ($pageActive == 'evenements.php') ? 'active' : '' ?>">Évènements</a></li>
        <li><a href="contact.php" class="<?= ($pageActive == 'contact.php') ? 'active' : '' ?>">Contact</a></li>
        <div class="position-absolute z-3 d-flex top-0 end-0 p-2">
            <a href="connexions.php">
                <img class="photo-profil" src="images/profil.png" alt="">
            </a>
        </div>
    </ul>
</nav>

<?php include 'menu-telephone.php'; ?>