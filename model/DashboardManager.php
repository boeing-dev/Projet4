<?php
require_once('Manager.php');

class DashboardManager extends Manager {
    public function checkPass($pass) {
        $db = $this->dbConnect();
        $response = $db->query('SELECT pass FROM author WHERE id=1'); 
        $donnees = $response->fetch();
        if ($donnees['pass'] = $pass) {
            return true;
        } else {
            return false;
        }
    }
}