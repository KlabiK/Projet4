<?php
// Chargement des classes
require_once('.\model/PostManager.php');
require_once('.\model/CommentManager.php');
require_once('.\model/UserManager.php');



function listArticles() //recupere les articles
{
    $postManager = new PostManager();// Création d'un objet
    $articles = $postManager-> getArticles();// Appel d'une fonction de cet objet

    require('.\view/frontend/articlesListView.php');
}
function article()
{

    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $comments = $commentManager-> getComments($_GET['id']);
    $article = $postManager-> getArticle($_GET['id']);
 
    require('.\view/frontend/articleView.php');
}
function addArticle()
{
    $postManager = new PostManager();
    $article = $postManager-> addArticle($_POST['title'], $_POST['content'], $_POST['synopsis']);
}
function home()
{
    require('.\view/frontend/homeView.php');
}
function signaler()
{
$commentManager = new CommentManager();
$signalCom = $commentManager->signaleCom($_GET['id']);
require('.\view/frontend/signaleView.php');
}
function addCom()
{
$commentManager = new CommentManager();
$addCom = $commentManager->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
}
function user()
{
$userManager = new UserManager();
$user = $userManager->user();

}