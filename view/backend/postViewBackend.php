<?php $title = 'Tableau de bord-lire un article'; ?>

<?php ob_start(); ?>
<h4>Lire un article</h4>
<a class="btnReturn" href="index.php?action=returnDashboard"><span class="fas fa-undo-alt"></span> Retour au tableau de bord</a>

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

<?php require('view/template/template.php'); ?>