<?php

require_once('security.php');
require_once('model/DashboardManager.php');
require_once('model/CommentManager.php');
require_once('model/PostManager.php');

function connexion() {
    require('view/backend/logIn.php');
}

function checkPassword($password) {
    $password = checkContent($password);
    $checkPassword = new DashboardManager();
    $passwordChecked = $checkPassword->checkPass($password);
    return $passwordChecked;
}

function listActionsBackend() {
    $postManager = new PostManager();
    $post = $postManager->getPosts();
    $postComment = new CommentManager();
    $comment = $postComment->commentToValid();
    $numberComment = $postComment->commentToValid();
    $messageCommentToValid = $postComment->messageComment($numberComment);
    
    
    require('view/backend/dashboardView.php');
}