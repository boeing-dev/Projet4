<?php
require_once('Manager.php');

class CommentManager extends Manager {
    public function getComments($postId) {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, comment_valid FROM comments WHERE id_post = ?');
    $comments->execute(array($postId));
    return $comments;
    }

    public function postComment($postId, $author, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(id_post, author, comment, comment_date, comment_valid) VALUES(?, ?, ?, NOW(), false)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }
    
    public function reportComment($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments set comment_valid=0 where id = ?');
        $comments->execute(array($postId));
    }
    
    public function commentToValid() {
        $db1 = $this->dbConnect();
        $comments = $db1->query('SELECT COUNT(*) AS total FROM comments WHERE comment_valid=0');
        while($data=$comments->fetch()) {
            return $data[0];}
        $comments->closeCursor();
    }
    
    public function messageComment($number) {
        $strNumber = strval($number);
        if ($number='0') {
            $message = 'Aucun commentaire en attente de validation';
        } else {
            $message = 'Vous avez ' . $strNumber . ' commentaire(s) en attente de validation';
        }
        return $message;
    }
}
