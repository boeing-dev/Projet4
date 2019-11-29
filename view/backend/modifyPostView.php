<?php $title = 'Tableau de bord-modifier un article'; ?>

<?php ob_start(); ?>
<h4>Modifier un article</h4>
<p><a href="index.php?action=returnDashboard" >Retour au tableau de bord</a></p>

<article class="postBackend">
    <h5>Article posté le <?= $post['date_post'] ?></h5>
    <form id="formModifyPost" action="index.php?action=postToModify&amp;id= <?= $post['id'] ?>" method="post" >
        <textarea id="postContent" name="postContent" rows="20" cols="150"><?= $post['post'] ?></textarea>
        <input type="submit" />
    </form>
</article>

<footer>
    <a href="index.php">Déconnection</a>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/templateDashboard.php'); ?>