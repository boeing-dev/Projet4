<?php

require('controller/security.php');
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $_POST['author'] = checkContent($_POST['author']);
                    $_POST['comment'] = checkContent($_POST['comment']);
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                     throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                changeComment($_GET['id']);    
            }
        }
        elseif ($_GET['action'] == 'connexion') {
            connexion();
        }
        elseif (($_GET['action'] == 'accessDashboard') && isset($_POST['password'])) {
            $_POST['password'] = checkContent($_POST['password']);
            if (checkPassword($_POST['password'])) {
                listActionsBackend();
            } else {
                listPostsFrontend();
            }
        }
        elseif (($_GET['action'] == 'returnDashboard')) {
            listActionsBackend();
        }
        elseif (($_GET['action'] == 'commentsToValidate')) {
            listCommentsToValidate();
        }
        elseif (($_GET['action'] == 'validComment')) {
            if (isset($_GET['id']) && ($_GET['val']<=1) && ($_GET['val']>=0)) {
                validComment($_GET['id'], $_GET['val']);
            }
        }
        elseif (($_GET['action'] == 'deletePost')) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePostView($_GET['id']);
            }
        } 
        elseif (($_GET['action'] == 'deletePost_Comment')) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePostComment($_GET['id']);
            }
        }
        elseif (($_GET['action'] == 'viewPost')) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                viewPostBackend($_GET['id']);    
            }            
        }
    }
    else {
        listPostsFrontend();
    }
}

catch(Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}