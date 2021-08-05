<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
    if(!isset($_SESSION['lvl'])){
    $_SESSION['lvl'] = 'echec';
    }
  }
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listArticles'){
        listArticles();
    } elseif ($_GET['action'] == 'article'){//Lecture article et ajout commentaires
        if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            header('Location: index.php?action=home');
           
        } else {
            extract($_GET);
            $id = strip_tags($_GET['id']);
            article($id);

            if (!empty($_POST)) {
                extract($_POST);
                $comment = strip_tags($comment);
                
                if (empty($comment)) {
                    $_SESSION['erreur'] = 'Entrez un commentaire';
                }else{
                    addCom($id, $_SESSION['userId'], $comment);
                    $_SESSION['message'] = 'Votre commentaire à été publié';
                    unset($comment);                    
                }
            }
        }
    } elseif ($_GET['action'] == 'home') {//Accueil
        home();
    } elseif ($_GET['action'] == 'signaler') {// Signalement Commentaire
        if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            header('Location: index.php?action=home');
        } else {
            extract($_GET);
            $signalId = strip_tags($_GET['id']);
            $articleId = strip_tags($_GET['idArt']);
            signaler($signalId);
            $_SESSION['erreur'] = 'Le commentaire à été signalé';
            header("Location: index.php?action=article&id=$articleId");
        }
    }elseif($_GET['action'] == 'editSignal'){// Retrait Signalement
        if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            header('Location: index.php?action=home');
        } else {
            extract($_GET);
            $id = strip_tags($_GET['id']);
            editSignal($id);
            header('Location: index.php?action=admin');
            $_SESSION['message'] = "Signalement retiré avec succès";
        }
        
    }elseif($_GET['action'] == 'supprSignal'){// Suppression Commentaire signalé
        if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            header('Location: index.php?action=home');
        } else {
            extract($_GET);
            $id = strip_tags($_GET['id']);
            supprSignalCom($id);
            header('Location: index.php?action=admin');
            $_SESSION['erreur'] = "Commentaire supprimé avec succès";
        }
      
    } elseif ($_GET['action'] == 'login'){//Page connexion
        login();
    } elseif($_GET['action'] == 'connect'){ //Connexion User
       
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            userConnect($login);       
        }
    }elseif ($_GET['action'] == 'registerPage'){//Page Inscription
        register();
       
    }elseif ($_GET['action'] == 'register'){//Inscription
        if(isset($_POST))
        {
            $erreurs = array();
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $passwordRetype = htmlspecialchars($_POST['password_retype']);
            
            if(!empty($login) && preg_match('/^[a-zA-Z0-9_]+$/',$login))
            {
                if(existUser($_POST['login']) == 0)
                {
                    if(!empty($password) && $password == $passwordRetype)
                    {
                        if (empty($erreurs)) {  
                            successRegister();
                            header('Location: index.php?action=login');    
                        }
                    }
                    else{
                        header('Location: index.php?action=register'); 
                        $_SESSION['erreur'] = 'Veuillez saisir un mot de passe valide';
                    }
                }else{
                    header('Location: index.php?action=register'); 
                    $_SESSION['erreur'] = 'Ce login est déjà pris';
                }

                   
            }else {
                header('Location: index.php?action=register'); 
                $_SESSION['erreur'] = "Votre login n'est pas valide";
            }

        }else {
            header('Location: index.php?action=register'); 
            $_SESSION['erreur'] = 'Veuillez completer tous les champs';
        }
    }elseif($_GET['action'] == 'admin'){//Page admin
        admin();
    }elseif($_GET['action'] == 'addPage'){// Page Ajout Chapitre
        addPage();
    }elseif($_GET['action'] == 'editPage'){//Page UPDATE Chapitre
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = strip_tags($_GET['id']);
            $chapitre = articleToEdit($id);
            if(!$chapitre){
            $_SESSION['erreur'] = "ID invalide";   
            }
        }else{
            $_SESSION['erreur'] = "URL invalide";
        }
    }elseif($_GET['action'] == 'edit'){// UPDATE Chapitre
            if($_POST){//verification des données à envoyer
                if(isset($_POST['id']) && !empty($_POST['id'])
                && isset($_POST['title']) && !empty($_POST['title'])
                && isset($_POST['content']) && !empty($_POST['content'])
                && isset($_POST['synopsis']) && !empty($_POST['synopsis'])){        
                    //nettoyage des données à envoyer
                    $id = strip_tags($_POST['id']);
                    $title = strip_tags($_POST['title']);
                    $content = strip_tags($_POST['content']);
                    $synopsis = strip_tags($_POST['synopsis']);
                    edit($id,$title,$content,$synopsis);

                }else{
                    $_SESSION['erreur'] = "Veuillez remplir tous les champs";
                }
            }
      
    }elseif($_GET['action'] == 'add'){// ADD Chapitre
        if($_POST){
            if(isset($_POST['content']) && !empty($_POST['content']) && isset($_POST['title']) && !empty($_POST['title'])&& $_POST['synopsis'] && !empty($_POST['synopsis'])){
                $content = strip_tags($_POST['content']);
                $title = strip_tags($_POST['title']);
                $synopsis = strip_tags($_POST['synopsis']);
                addArticle($title, $content, $synopsis);
                admin();
            }
        }
    }elseif($_GET['action'] == 'supprPage'){// DELETE Chapitre
        extract($_GET);
        $id = strip_tags($_GET['id']);
        $article = callArticleToSuppr($id);
     //verification article existe
     if(isset($_POST['suppr'])){
         if(isset($_GET['id']) && !empty($_GET['id'])){
               if(!$article){
                   $_SESSION['erreur'] = "ID invalide";
                   header('Location: index.php');
                   die();   
               }
            supprArticle($id);
            header('Location:index.php?action=admin');
            $_SESSION['message'] = "Chapitre supprimé avec succès";
            die();
             }
     }else{
         $_SESSION['erreur'] = "Veuillez cocher la case pour valider la suppression";
         die();
     }
     
    }elseif($_GET['action'] == 'logout'){
        logout();
    } else {
        home();
    }
}
