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

function listCommentsToValidate() {
    $commentsManager = new CommentManager();
    $comments = $commentsManager->getCommentsBackend();
    
    require('view/backend/commentView.php');
}

function validComment($commentId, $commentAction) {
    $commentManager = new CommentManager();
    $comment = $commentManager->actionValidComment($commentId, $commentAction);
    
    header('Location: index.php?action=returnDashboard');
}

function deletePostView($postId) {
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    
    require('view/backend/deletepostView.php');
}

function deletePostComment($postId) {
    $postManager = new PostManager();
    $post = $postManager->deletePost($postId);
    $commentManager = new CommentManager();
    $comment = $commentManager->deleteComment($postId);
    
    header('Location: index.php?action=returnDashboard');
}

function viewPostBackend($postId) {
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    
    require('view/backend/postViewBackend.php');
}