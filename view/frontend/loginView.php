<?php $title = 'Connexion';?>
<?php ob_start(); ?>
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link" href="index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="index.php?action=listArticles">Chapitres</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=listArticles">Connexion</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="index.php?action=registerPage">Inscription</a>
        </li>
    </ul>

<?php $menu = ob_get_clean();?>
<?php ob_start(); ?>
<div class="container">
    <h1 class="text-center my-4">Connexion</h1>
    <form action="index.php?action=connect" method="POST" class=" my-3">
        <div class="form-group row-4">
            <label>Veuillez saisir votre identifiant :</label>
            <input class="form-control" type="text" name="login" autocomplete="on">
        </div>
        <div class="form-group row-4">
            <label>Veuillez saisir votre mot de passe :</label>
            <input class="form-control" type="password" name="password" autocomplete="off">
        </div>
        <input class="btn btn-primary" type="submit">
    </form>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>