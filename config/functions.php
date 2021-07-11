<?php
// FONCTION QUI RECUPERE TOUS LES ARTICLES
function getArticles()
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT id, title,synopsis date FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
// FONCTION QUI RECUPERE UN ARTICLE
function getArticle($id)
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if ($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    } else
        header('Location: index.php');
    $req->closeCursor();
}
// FONCTION QUI AJOUTE UN COMMENTAIRE
function addComment($articleId, $author, $comment)
{
    require('config/connect.php');
    $req = $bdd->prepare('INSERT INTO comments(articleId, author, comment, date) VALUES (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}
// FONCTION QUI RECUPERE LES COMMENTAIRES D'UN ARTICLE
function getComment($id)
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ? ORDER BY date DESC');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function getSignalComment($id){
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments WHERE id = ?');
    $req->execute(array($id));
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();

}
//FONCTION QUI AJOUTE UN ARTICLE
function addArticle($title, $content, $synopsis)
{
    require('config/connect.php');
    $req = $bdd->prepare('INSERT INTO articles( title, content, synopsis, date) VALUES( ?, ?, ?, NOW())');
    $req->execute(array($title, $content, $synopsis));
    $req->closeCursor();
    $_SESSION['message'] = "Votre chapitre à bien été ajouté";
}   

