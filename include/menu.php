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
    </ul>
</nav>

<?php include 'menu-telephone.php'; ?>