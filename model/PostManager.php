<?php
require_once('Manager.php');
class PostManager extends Manager
{
public function getArticles(){ // Récupération des Chapitres
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT id, title,synopsis, date FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
public function getArticle($id){// Récupération d'un chapitre
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if ($req->rowCount() == 1) {
        $chapitre = $req->fetch(PDO::FETCH_OBJ);
        return $chapitre;
    } else
        header('Location: index.php?action=home');
    $req->closeCursor();
}
function addArticle($title, $content, $synopsis){//Ajout d'un Chapitre
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('INSERT INTO articles( title, content, synopsis, date) VALUES( ?, ?, ?, NOW())');
    $req->execute(array($title, $content, $synopsis));
    $req->closeCursor();
    $_SESSION['message'] = "Votre chapitre à bien été ajouté";
}
public function arrayArticles(){// Recup chapitres pour interface admin
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT id, title, synopsis FROM articles');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
}
public function update($id,$title,$content, $synopsis){// UPDATE d'un chapitre
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('UPDATE articles SET title=:title ,content=:content, synopsis=:synopsis WHERE id=:id');
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':title', $title, PDO::PARAM_STR);
    $req->bindValue(':content', $content, PDO::PARAM_STR);
    $req->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
    $req->execute();
    $req->closeCursor();
}
public function articleToSuppr($id){ //verification si article existe
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('SELECT * FROM articles WHERE id=:id');
    $req->execute([ "id"=>$id]);
    $article = $req->fetch();
    return $article;
}
public function supprDone($id){ // Suppression Article
    $bdd = $this-> bddConnect();
    $req = $bdd->prepare('DELETE FROM articles WHERE id = :id');
    $req->execute(["id"=>$id]);
}
}