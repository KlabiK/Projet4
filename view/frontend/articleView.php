<?php $title = "Article"; ?>

<?php ob_start(); ?>
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link" href="index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="index.php?action=listArticles">Chapitres</a>
        </li>
        <?php if(!isset($_SESSION['user'])){?>
        <li class="nav-item">
        <a class="nav-link" href="index.php?action=login">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=registerPage">Inscription</a>
        </li>
        <?php } ?>
        <?php if($_SESSION['lvl']==1){?>
        <li class="nav-item">
        <a class="nav-link" href="index.php?action=admin">Administration</a>
        </li>
        <?php } ?>
        <?php if(isset($_SESSION['user'])){?>
        <li class="nav-item">
        <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
        </li>
        <?php } ?>
      
    </ul>
<?php $menu = ob_get_clean(); ?>
<?php ob_start();?>
<div class="container">
   
<a class="btn btn-info my-2"href=".\index.php?action=listArticles">Retour aux Chapitres</a>
    <div class="row">
        <div class="col text-center ">
            <h1 class="my-4"><?= $article->title ?></h1>
            <?php   if (!empty($_SESSION['message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div';
        $_SESSION['message'] = "";
    }elseif (!empty($_SESSION['erreur'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div';
        $_SESSION['erreur'] = "";
    } ?>
            <time class="my-2"><?= $article->date ?></time>
            <p><?= $article->content ?></p>
            <hr />
        </div>
    </div>

    <?php if(isset($_SESSION['user']) && $_SESSION['lvl'] == 0){?>
    <form class="my-4" action="index.php?action=article&id=<?= $article->id ?>" method="POST">
        <div class="form-group">
            <label for="comment">Commentaire :</label><br />
            <textarea name="comment" id="comment" cols="30" rows="8" required></textarea>
        </div>
        <button class="btn btn-primary mb-4" type="submit">Envoyer</button>
    </form>
    <?php } ?>
    <?php if($comments){ ?>
    <h2>Commentaires :</h2>
    <?php
    foreach ($comments as $com) : ?>
        <h3><?= $com->author ?></h3>
        <time><?= $com->date ?></time>
        <p><?= $com->comment ?></p>
        <?php if(!($_SESSION['lvl'] == 'echec') && $com->signalement == 0 ){?>
        <a class="btn btn-danger mb-4"  href=".\index.php?action=signaler&id=<?= $com->id ?>&idArt=<?= $article->id ?>">Signaler</a>
        <?php } ?>
        <?php if($com->signalement == 1 && !($_SESSION['lvl'] === 'echec' )){?>
            <button type="button" class="btn btn-secondary">Déjà signalé</button>
        <?php } ?>
    <?php endforeach; 
    }?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>