<?php

require_once('security.php');
require_once('model/AccessDashboard.php');

function connexion() {
    require('view/backend/logIn.php');
}

function checkPassword($password) {
    $password = checkContent($password);
    $checkPassword = new AccessDashboard();
    $passwordChecked = $checkPassword->checkPass($password);
    return $passwordChecked;
}

function dashboard() {
    require('view/backend/dashboard.php');
}