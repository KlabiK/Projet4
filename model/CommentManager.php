<?php
require_once('Manager.php');
class CommentManager extends Manager
{
function getComments($id){ // Récuperation des commentaires
    $bdd = $this-> bddConnect();
   // $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ? ORDER BY date DESC');
    $req = $bdd->prepare('SELECT users.login,comments.id,comments.date, comments.comment, comments.signalement FROM comments INNER JOIN users ON comments.author = users.id WHERE comments.articleId = ? ORDER BY comments.date DESC');

    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
 function signaleCom($id){ // Signalement commentaire
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('UPDATE comments SET signalement = 1  WHERE id = ?');
    $req->execute(array($id));
    $req->closeCursor();
 }
 function addComment($articleId, $author, $comment){ //Ajout commentaire
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('INSERT INTO comments(comments.articleId, comments.author, comments.comment, comments.date)VALUES (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}
public function signalList(){ // Liste des commentaires signalés
    $bdd = $this-> bddConnect();
    //$req = $bdd->prepare('SELECT * FROM comments WHERE signalement = 1 ORDER BY date DESC');
    $req = $bdd->prepare(' SELECT articles.title,users.login,comments.id, comments.comment FROM comments INNER JOIN articles ON articles.id=comments.articleId INNER JOIN users ON comments.author = users.id WHERE comments.signalement = 1 ORDER BY comments.date DESC ');

    $req->execute(array());
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
public function withdrawSignal($id){  //retrait signalement
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('UPDATE comments SET signalement = 0  WHERE id = ?');
    $req->execute(array($id));
    $req->closeCursor();
}
public function supprSignal($id){ //suppression du commentaire
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('DELETE FROM comments WHERE id = :id');
    $req->execute(["id"=>$id]);
}
}