<?php

class Manager
 {
  protected function bddConnect() //connexion à la base de données
  {
    $bdd = new PDO('mysql:host=db5003982715.hosting-data.io;dbname=dbs3269987;charset=utf8', 'dbu1844048', 'Abarai69+92000');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $bdd;
  }
 }