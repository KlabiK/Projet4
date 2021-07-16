<?php
require_once('.\model/Manager.php');
class CommentManager extends Manager
{
    public function getComments($idBillet)
    {
        $db =$this-> dbConnect();
        $commentaires = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
        $commentaires->execute(array($idBillet));

        return $commentaires;
    }
    public function postComment($idBillet, $auteur, $commentaire)
    {
        $db = $this->dbConnect();
        $commentaires = $db->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
        $affectedLines = $commentaires->execute(array($idBillet, $auteur, $commentaire));

        return $affectedLines;
    }
}