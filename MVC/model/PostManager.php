<?php
require_once('.\model/Manager.php');
class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this-> dbConnect();
        $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($idBillet)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
        $req->execute(array($idBillet));
        $post = $req->fetch();

        return $post;
    }

}