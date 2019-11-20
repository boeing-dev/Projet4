<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<?php
while ($data = $post->fetch()) {
?>
    <article class="post">
        <p>
            <?= nl2br(htmlspecialchars($data['post'])) ?>
            <br>
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </article>

<?php
}
$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>