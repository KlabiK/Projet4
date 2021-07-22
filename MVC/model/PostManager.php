<?php
require_once('Manager.php');
class PostManager extends Manager
{
    public function getArticles()
{
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT id, title,synopsis date FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);

    return $data;
    $req->closeCursor();
}
public function getArticle($id)
{
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if ($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    } else
        header('Location: index.php');
    $req->closeCursor();
}
//FONCTION QUI AJOUTE UN ARTICLE
function addArticle($title, $content, $synopsis)
{
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('INSERT INTO articles( title, content, synopsis, date) VALUES( ?, ?, ?, NOW())');
    $req->execute(array($title, $content, $synopsis));
    $req->closeCursor();
    $_SESSION['message'] = "Votre chapitre à bien été ajouté";
}   
}