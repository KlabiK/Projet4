<?php ob_start(); ?>
<ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="articlesList.php">Chapitres</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="account.php">Mon compte</a>
    </li>
</ul>
<?php $menu = ob_clean();

ob_start(); ?>
   </div>
<main class="container">
    <div class="row">
        <div class="col-10">
            <?php
            if (!empty($_SESSION['message'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div';
                $_SESSION['message'] = "";
            }
            ?>
            <h1 class="text-center my-4">Billet simple pour l'Alaska</h1>
            <table class="table">
                <thead>
                    <th rows="6">Chapitre</th>
                    <th>Synopsis</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $chapitre) {
                    ?>
                        <tr>
                            <td><?= $chapitre['title'] ?> </td>
                            <td><?= $chapitre['synopsis'] ?> </td>
                            <td><a href="edit.php?id=<?= $chapitre['id'] ?>">Modifier /</a>
                                <a href="delete.php?id=<?= $chapitre['id'] ?>">Supprimer</a>
                                <a href="commentaires.php?id=<?= $chapitre['id'] ?>">Commentaires</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <a href="index.php?action=add" class="btn btn-primary my-4">Ajouter un article</a>
        </div>

    </div>
</main>
<?php $content = ob_clean();
require('template.php'); ?>
