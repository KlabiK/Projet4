<?php $title = "Billet pour L'alaska"; ?>

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

<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class=" form-group text-center">
                <h1 class="my-4">Chapitres</h1>
                <hr>
                <div class="row align-items-center">
                    <?php foreach ($articles as $article) : ?>
                        <div class="col-4">
                            <h2><?= $article->title ?></h2>
                            <time><?= $article->date ?></time><br />
                            <a class="form-control btn btn-info" href=".\index.php?action=article&id=<?= $article->id ?>">Lire le chapitre</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>