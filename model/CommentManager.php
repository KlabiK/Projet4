<?php
require_once('Manager.php');
class CommentManager extends Manager
{
function getComments($id){ // Récuperation des commentaires
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ? ORDER BY date DESC');
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
    $req = $bdd->prepare('INSERT INTO comments(articleId, author, comment, date) VALUES (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}
public function signalList(){ // Liste des commentaires signalés
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT * FROM comments WHERE signalement = 1 ORDER BY date DESC');
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