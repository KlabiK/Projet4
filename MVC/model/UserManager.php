<?php
require_once('Manager.php');
class UserManager extends Manager
{
    public function user(){
        $bdd = $this-> bddConnect();
        $req = $bdd->prepare('SELECT * FROM users WHERE id= ?');
        $req->execute();
        $pass = $req->fetch();
    }
   
   
}