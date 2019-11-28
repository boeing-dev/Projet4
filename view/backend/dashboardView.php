<?php $title = 'Tableau de bord'; ?>

<?php ob_start(); ?>
<h4>Tableau de bord</h4>
<section>
    <div id="alertComment">
        <p><?= $messageCommentToValid ?></p>
        <a href="index.php?action=commentsToValidate">Gérer les commentaires</a>
    </div>
    <?php
    while ($data = $post->fetch()) {
    ?>
        <article class="postBackend">
            <h5>Article posté le <?= $data['date_post'] ?></h5>
            <p><?= nl2br(htmlspecialchars($data['post'])); ?></p>
            <a href="#"><span class="fas fa-eye"></span> Voir</a>
            <a href="#"><span class="fas fa-edit"></span> Modifier</a>
            <a href="#"><span class="fas fa-trash-alt"></span> Effacer</a>
        </article>
    <?php 
    }
    $post->closeCursor();
    ?>    
</section>       
<footer>
    <a href="index.php">Déconnection</a>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/templateDashboard.php'); ?>