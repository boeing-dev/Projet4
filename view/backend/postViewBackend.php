<?php $title = 'Tableau de bord-lire un article'; ?>

<?php ob_start(); ?>
<h4>Lire un article</h4>
<p><a href="index.php?action=returnDashboard" >Retour au tableau de bord</a></p>

<article class="postBackend">
    <h5>Article posté le <?= $post['date_post'] ?></h5>
    <p> 
        <?= nl2br(htmlspecialchars(($post['post']))) ?>
    </p>
</article>

<footer>
    <a href="index.php">Déconnection</a>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/templateDashboard.php'); ?>