<?php $title = 'Chapitre'; ?>

<?php ob_start() ?>
<a class="btnReturn" href="index.php"><span class="fas fa-undo-alt"></span> Retour à la liste des chapitres</a>

<article class="post">
    <p>
        <?= nl2br(htmlspecialchars($post['post'])) ?>
    </p>
</article>

<h6>Commentaires</h6>
<article id="comments">
    <?php
    while ($comment = $comments->fetch()) {
        if ($comment['comment_valid']) {
    ?>
            <p> 
                <strong><?= htmlspecialchars($comment['author']) ?></strong><br>
                <?= nl2br(htmlspecialchars($comment['comment'])) ?><br>
                <em><a href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?> ">Signaler</a></em>
            </p>
    <?php
        }
    }
    ?>
</article>

<h6>Ajout d'un commentaire</h6>
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div id="blockAddCommentName">
        <label for="author">Nom</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div id="blockAddCommentContent">
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div id="btnAddComment">
        <input type="submit" />
    </div>
</form>

<footer>
    <a href="index.php?action=connexion">Administration du site</a>
</footer>

<?php $content = ob_get_clean(); ?>
<?php require('view/template/template.php') ?>