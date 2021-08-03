<?php $title = "Suppression"; ?>
<?php ob_start(); ?>
<ul class="navbar-nav">
   <li class="nav-item active">
      <a class="nav-link" href="index.php?action=home">Accueil</a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="index.php?action=admin">Chapitres</a>
   </li>
   <?php if (isset($_SESSION['user'])) { ?>
      <li class="nav-item">
         <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
      </li>
   <?php } ?>
</ul>
<?php $menu = ob_get_clean(); ?>
<?php ob_start(); ?>
<div class="container my-4">
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
   <div class="row">
      <div class="col text-center">
         <form method="POST">
            <h1><?= $article['title'] ?></h1>
            <time><?= $article['date'] ?></time>
            <p><?= $article['content'] ?></p>
            <hr>
            <label><input type="checkbox" class="suppr" name="suppr" required> Êtes vous sur de vouloir supprimer le chapitre </label><br>
            <button class="btn btn-primary my-4">Supprimer le Chapitre</button>
         </form>
      </div>
   </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>