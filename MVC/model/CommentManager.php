<?php
require_once('Manager.php');
class CommentManager extends Manager
{
    function getComments($id)
{
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ? ORDER BY date DESC');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
 function signaleCom($id)
 {
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT * FROM comments WHERE id = ?');
    $req->execute(array($id));
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
 }
 function addComment($articleId, $author, $comment)
{
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('INSERT INTO comments(articleId, author, comment, date) VALUES (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}
   
}