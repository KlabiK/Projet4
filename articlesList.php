<?php

require('MVC/model/PostManager.php');

function listArticles() //recupere les articles
{
    $postManager = new PostManager();// Création d'un objet
    $posts = $postManager-> getArticles();// Appel d'une fonction de cet objet

    require('MVC/view/frontend/articlesListView.php');
}
?>