<?php $title = 'Tableau de bord-ajouter un article'; ?>

<?php ob_start(); ?>
<h4>Ajouter un article</h4>
<p><a href="index.php?action=returnDashboard" >Retour au tableau de bord</a></p>

<form action="index.php?action=addPost" method="post">
    <textarea id="comment" name="post"></textarea>
    <input type="submit" />  
</form>

<footer>
    <a href="index.php">Déconnection</a>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/templateDashboard.php'); ?>