<?php
 if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
require_once('controller/frontend.php');
require('view/frontend/accueilView.php');
$articles = getArticles();
?>