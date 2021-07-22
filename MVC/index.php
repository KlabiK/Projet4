<?php
require('controller/frontend.php');


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listArticles') {
        listArticles();
    } elseif ($_GET['action'] == 'article') {

        if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            var_dump($_GET['id']);
            die;
            header('Location: index.php');
           
        } else {
            extract($_GET);
            $id = strip_tags($id);
             if(!empty($_POST))
                    {
                        extract($_POST);
                        $errors = array();
                
                        $author = strip_tags($author);
                        $comment = strip_tags($comment);
                
                        if(empty($author))
                        {
                            $_SESSION['erreur'] = 'Entrez un pseudo';
                        }
                        if(empty($comment))
                        {
                            $_SESSION['erreur'] ='Entrez un commentaire';
                        }
                        if(count($errors) == 0)
                        {
                            $articleId = $_GET['id'];                           
                            $comment = addCom($id, $author, $comment);
                            $_SESSION['message'] = 'Votre commentaire à été publié';
                            unset($author);
                            unset($comment);
                            header("Location: index.php?action=article&id=$articleId");
                        }
                    }else{
                
                    }
            article();
        }
    } elseif ($_GET['action'] == 'listArticles') {
        listArticles();
    } elseif ($_GET['action'] == 'home') {
        home();
    } elseif ($_GET['action'] == 'signaler') {
        if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            header('Location: index.php');
        } else {
            extract($_GET);
            $id = strip_tags($id);
            signaler();
        }
    } else {
        home();
    }
}
