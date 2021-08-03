<?php
// Chargement des classes
require_once('.\model/PostManager.php');
require_once('.\model/CommentManager.php');
require_once('.\model/UserManager.php');



function listArticles() //recupere les articles
{
    $postManager = new PostManager(); // Création d'un objet
    $articles = $postManager->getArticles(); // Appel d'une fonction de cet objet

    require('.\view/frontend/articlesListView.php');
}
function article($id)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($id);
    $article = $postManager->getArticle($id);

    require('.\view/frontend/articleView.php');
}
function home()
{
    require('.\view/frontend/homeView.php');
}
function signaler()
{
    $commentManager = new CommentManager();
    $signalCom = $commentManager->signaleCom($_GET['id']);
}
function editSignal($id)
{
    $commentManager = new CommentManager();
    $editSignal = $commentManager-> withdrawSignal($id);
}
function supprSignalCom($id)
{
    $commentManager = new CommentManager();
    $supprSignal = $commentManager-> supprSignal($id);
}
function addCom()
{
    $commentManager = new CommentManager();
    $addCom = $commentManager->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
}
function userConnect($login){ //Connexion et redirection en fonction droits
    $userManager = new UserManager();
    $user = $userManager->user($login); 
   
        if (isset($user)) {
            $passVerif = password_verify($_POST['password'],$user['password']);
            if ($passVerif== true) {
                $_SESSION['user'] = $user['login'];
                $_SESSION['lvl'] = $user['type'];
                
                if($user['type'] == '1')//admin
                {
                    header('Location: index.php?action=admin');
                }elseif($user['type'] == '0') //visiteur
                {
                    header('Location: index.php?action=listArticles');
                }else{
                    header('Location: index.php?action=home');
                }
            }
            home();
        } 
        home();    
}
function existUser($login){// Verification si user existe
    $userManager = new UserManager();
    $row = $userManager->user($login);
    return $row;
}
function login(){// Charge Page Connexion
    require('.\view/frontend/loginView.php');   
}
function admin(){//Chargement Page admin
    $postManager = new PostManager();
    $signalManager = new CommentManager();
    $result = $postManager->arrayArticles();
    $data = $signalManager->signalList();
    require('.\view/frontend/adminView.php');
}
function addPage(){//Vue Page Ajout
    require('.\view/frontend/addView.php');
}
function addArticle($title,$content,$synopsis) {// Ajout chapitre
    $postManager = new PostManager();
    $article = $postManager->addArticle($title, $content, $synopsis);
}
function register() {//Charge vue register
    require('.\view/frontend/inscriptionView.php');
}
function successRegister(){ // Enregistre nouvel Utilisateur
    $userManager = new UserManager();
    $user = $userManager->acceptRegister();
}
function callArticleToSuppr($id){ // Recup chapitre à SUPPR
    $postManager = new PostManager();
    $article = $postManager->articleToSuppr($id);  
    require('.\view/frontend/deleteView.php');
    return $article;
  
}
function supprArticle($id){ //SUPPR chapitre
    $postManager = new PostManager();
    $ArticleSuppr = $postManager->supprDone($id);
}
function edit($id,$title,$content, $synopsis){ // UPDATE chapitre
    $postManager = new PostManager();
    $update = $postManager->update($id,$title,$content, $synopsis);
    header('Location:index.php?action=admin ');
    $_SESSION['message'] = "chapitre modifié avec succés";
}
function articleToEdit($id){ // Recup chapitre pour UPDATE
    $postManager = new PostManager();
    $chapitre = $postManager->getArticle($id);
    require('.\view/frontend/editView.php');
}