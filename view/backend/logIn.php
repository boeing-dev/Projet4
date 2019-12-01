<?php $title = 'Billet simple pour l\'Alaska - Connexion'; ?>

<?php ob_start(); ?>
<h4>Connection au tableau de bord</h4>
<form id="formConnexion" action="index.php?action=accessDashboard" method="post">
    <div id="passwordContainer">
        <label for="password">Mot de passe</label>
        <input type="text" name="password" id="password">
    </div>    
    <input id="btnConnexion" type="submit">
    
</form>
<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>