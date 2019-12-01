<?php

require('controller/security.php');
require('controller/frontend.php');
require('controller/backend.php');

try {    
    if (isset($_GET['action'])) {
        switch ($_GET['action']){
            case 'post' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                } else {
                throw new Exception('Aucun identifiant de billet envoyé');
                }
            break;
            case 'addComment' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        $_POST['author'] = checkContent($_POST['author']);
                        $_POST['comment'] = checkContent($_POST['comment']);
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            break;
            case 'reportComment' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    changeComment($_GET['id']);
                }
            break;
            case 'connexion' :
                connexion();
            break;
            case 'returnDashboard' :
                listActionsBackend();
            break;
            case 'commentsToValidate' :
                listCommentsToValidate();
            break;
            case 'validComment' :
                if (isset($_GET['id']) && ($_GET['val']<=1) && ($_GET['val']>=0)) {
                    validComment($_GET['id'], $_GET['val']);
                }
            break;
            case 'deletePost' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    deletePostView($_GET['id']);
                }
            break;
            case 'deletePost_Comment' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    deletePostComment($_GET['id']);
                }
            break;
            case 'viewPost' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    viewPostBackend($_GET['id']);    
                }    
            break;
            case 'addPostView' :
                require('view/backend/addPostView.php');
            break;
            case 'addPost' :
                if (!empty($_POST['post'])) {
                    $_POST['post'] = checkContent($_POST['post']);
                    addPost($_POST['post']);
                }
            break;
            case 'viewPostToModify' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    viewPostToModify($_GET['id']); 
                }
            break;
            case 'postToModify' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {                
                    if (!empty($_POST['postContent'])) {
                        $_POST['postContent'] = checkContent($_POST['postContent']);
                        modifyPost($_GET['id'], $_POST['postContent']);                    
                    }
                }
            break;
            case 'accessDashboard' :
                if (isset($_POST['password'])) {
                    $_POST['password'] = checkContent($_POST['password']);
                    if (checkPassword($_POST['password'])) {
                        listActionsBackend();
                    } else {
                        listPostsFrontend();
                    }
                }
            break;
            default :
                listPostsFrontend();
        }
    } else {
        listPostsFrontend();
    }
}

catch(Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}