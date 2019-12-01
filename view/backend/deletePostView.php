<?php $title = 'Tableau de bord-effacer un article'; ?>

<?php ob_start(); ?>
<h4>Effacer un article</h4>

<article class="postBackend">
    <h5>Article posté le <?= $post['date_post'] ?></h5>
    <p> 
        <?= nl2br(htmlspecialchars(($post['post']))) ?>
    </p>
    <h2>Etes vous sûr de vouloir effacer cet article ?</h2>
    <a class="btnDelete" href="index.php?action=deletePost_Comment&amp;id=<?= $post['id'] ?>">EFFACER</a>
    <a class="btnDelete" href="index.php?action=returnDashboard">ANNULER</a>
</article>

<footer>
    <a href="index.php">Déconnection</a>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>