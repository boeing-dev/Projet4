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
        $posts = $db->prepare('SELECT id, post, date_post FROM posts WHERE id = ?');
        $posts->execute(array($postId));
        $post = $posts->fetch();
        return $post;
        $posts->closeCursor();
    }
    
    public function deletePost($postId) {
        $db = $this->dbConnect();
        $post = $db->prepare('DELETE FROM posts WHERE id = ?');
        $post->execute(array($postId));
        $post->closeCursor();
    }
    
    public function setPost($postContent) {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(post, date_post) VALUES (?, NOW())');
        $newPost->execute(array($postContent));
        $newPost->closeCursor();
    }
    
    public function modifyPost($postId, $postContent) {
        $db = $this->dbConnect();
        $modifyPost = $db->prepare('UPDATE posts set post = ? WHERE id = ?');
        $modifyPost->execute(array($postContent, $postId));
        $modifyPost->closeCursor();
    }
}
