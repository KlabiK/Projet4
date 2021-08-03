<?php $title = "Article"; ?>

<?php ob_start(); ?>
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link" href="index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="index.php?action=listArticles">Chapitres</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="index.php?action=login">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=registerPage">Inscription</a>
        </li>
    </ul>
<?php $menu = ob_get_clean(); ?>
<?php
    if (!empty($_SESSION['message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div';
        $_SESSION['message'] = "";
    }
    if (!empty($_SESSION['erreur'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div';
        $_SESSION['erreur'] = "";
    }

 ob_start();
?>
<div class="container">
<a class="nav-link" href=".\index.php?action=listArticles"> <<< Retour aux Chapitres</a>
    <div class="row">
        <div class="col text-center ">
            <h1 class="my-4"><?= $article->title ?></h1>
            <time class="my-2"><?= $article->date ?></time>
            <p><?= $article->content ?></p>
            <hr />
        </div>
    </div>


    <form class="my-4" action="index.php?action=article&id=<?= $article->id ?>" method="POST">
        <div class="form-group">
            <label for="author">Pseudo :</label><br />
            <input type="text" name="author" id="author" value="<?php if (isset($author)) echo $author ?>" required />
        </div>
        <div class="form-group">
            <label for="comment">Commentaire :</label><br />
            <textarea name="comment" id="comment" cols="30" rows="8" required></textarea>
        </div>
        <button class="btn btn-primary mb-4" type="submit">Envoyer</button>
    </form>
    <?php if($comments){ ?>
    <h2>Commentaires :</h2>
    <?php
    foreach ($comments as $com) : ?>
        <h3><?= $com->author ?></h3>
        <time><?= $com->date ?></time>
        <p><?= $com->comment ?></p>
        <a class="btn btn-danger mb-4"  href=".\index.php?action=signaler&id=<?= $com->id ?>">Signaler</a>
    <?php endforeach; 
    }?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>