<?php $title = 'Tableau de bord-Commentaire'; ?>

<?php ob_start(); ?>
<h4>Gestion des commentaires</h4>
<a class="btnReturn" href="index.php?action=returnDashboard"><span class="fas fa-undo-alt"></span> Retour au tableau de bord</a>

<?php 
while($data = $comments->fetch()) {
    ?>
    <article class="commentBackend">
        <h5>Commentaire posté le <?= $data['comment_date'] ?></h5>
        <p> <?= nl2br(htmlspecialchars(($data['comment']))) ?><br/>
            Edité par : <?= htmlspecialchars($data['author']) ?>
        </p>
        <a href="index.php?action=validComment&amp;id=<?= $data['id'] ?>&amp;val=1"><span class="fas fa-check"></span> Valider</a>
        <a href="index.php?action=validComment&amp;id=<?= $data['id'] ?>&amp;val=0"><span class="fas fa-times"></span> Supprimer</a>
    </article>
<?php
}
$comments->closeCursor();
?>
<footer>
    <a href="index.php">Déconnection</a>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>