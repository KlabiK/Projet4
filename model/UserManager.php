<?php
require_once('Manager.php');
class UserManager extends Manager
{
    public function user($login)//recupère Utilisateur
    {
        $bdd = $this->bddConnect();
        $req = $bdd->prepare('SELECT * FROM users WHERE login = ?');
        $req->execute(array($login));
        $user = $req->fetch();
        $row = $req->rowCount();
        return $user;

    }  
    public function acceptRegister(){ // Ajout Utilisateur
        $bdd = $this-> bddConnect();
        $req = $bdd->prepare("INSERT INTO users SET login= ?,password=?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $req->execute([$_POST['login'],$password]);
        $_SESSION['message'] = "Votre compte à bien été créé";
    }
   
   
   
}