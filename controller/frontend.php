<?php

require_once('security.php');
require_once('model/CommentManager.php');
require_once('model/PostManager.php');

function listPostsFrontend() {
    $postManager = new PostManager(); 
    $post = $postManager->getPosts();
    
    require('view/frontend/indexView.php');
}

function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getCommentsFraontend($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment) {
    $commentManager = new CommentManager();
    $author = checkContent($author);
    $comment = checkContent($comment);
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function changeComment($commentId) {
    $commentManager = new CommentManager();
    $affectedComment = $commentManager->reportComment($commentId);
    listPosts();
}
