<?php $title = "Signaler"; ?>

<?php ob_start(); ?>
<ul class="navbar-nav">
    <li class="nav-item ">
        <a class="nav-link" href="index.php?action=home">Accueil</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href=".\index.php?action=listArticles">Chapitres</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="register.php">Inscription</a>
    </li>
</ul>
<?php $menu = ob_get_clean(); ?>
<?php ob_start(); ?>
<div class="container">
    <?php

    if (!empty($_SESSION['message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div';
        $_SESSION['message'] = "";
    }
    if (!empty($_SESSION['erreur'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div';
        $_SESSION['erreur'] = "";
    }

    ?>
    <h1 class="text-center my-4">Fiche de signalement</h1>
    <hr>
    <div class="row">
        <div>
            <h3>Auteur :</h3> <label> <?= $signalCom->author ?></label>

            <h3> Date et heure :</h3>
            <time> <?= $signalCom->date ?></time>

            <h3> Message :</h3>
            <p><?= $signalCom->comment ?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <form class="my-4 col-8" action="signaler.php?id=<?= $signalCom->id ?>" method="POST">
            <div class="form-group">
                <label for="motif">Motif :</label><br />
                <select class="form-control " name="motif">
                    <option value="motifVide"></option>
                    <option value="motifUn">Contenu indésirable</option>
                    <option value="motifDeux">Discours haineux</option>
                    <option value="motifTrois">Harcèlement</option>
                    <option value="motifQuatre">Autres</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="mail" name="email" required>
            </div>
            <div class="form-group">
                <label for="comment">Commentaire :</label>
                </label><br>
                <textarea name="comment" id="comment" cols="30" rows="8" required></textarea>
            </div>
            <button class="btn btn-primary mb-4" type="submit">Envoyer</button>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>