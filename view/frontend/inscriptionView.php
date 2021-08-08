<?php $title = 'Page d\'Inscription'; ?>
<?php ob_start(); ?>
    <li class="nav-item ">
        <a class="nav-link" href="index.php?action=home">Accueil</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="index.php?action=listArticles">Chapitres</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?action=login">Connexion</a>
    </li>
<?php $menu = ob_get_clean(); ?>
<?php ob_start(); ?>
<div class="container" id="inscriptionPage">
    <h1 class="text-center my-4">Inscription</h1>
    <?php
    if (!empty($_SESSION['message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div';
        $_SESSION['message'] = "";
    }elseif(!empty($_SESSION['erreur'])){
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div';
        $_SESSION['erreur'] = "";
    }
    ?>
    <form action="index.php?action=register" method="post" class="my-3">
        <div class="form-group row-4">
            <input type="text" name="login" class="form-control" placeholder="Identifiant" required="required" autocomplete="off">
        </div>
        <div class="form-group row-4">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group row-4">
            <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info my-4">S'inscrire</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>