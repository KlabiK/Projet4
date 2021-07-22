<?php

class Manager
 {
  protected function bddConnect()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $bdd;
  }
 }