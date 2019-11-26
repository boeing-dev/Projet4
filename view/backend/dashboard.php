<?php $title = 'Tableau de bord'; ?>

<?php ob_start(); ?>
<h4>Tableau de bord</h4>
<footer>
    <a href="index.php">Déconnection</a>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/templateDashboard.php'); ?>