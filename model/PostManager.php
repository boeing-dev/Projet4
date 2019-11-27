<?php 
require_once('Manager.php');

class PostManager extends Manager {    
    public function getPosts() {
        $db = $this->dbConnect();    
        $post = $db->query('SELECT id, post, date_post  FROM posts');    
        return $post;
    }

    public function getPost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }
}
