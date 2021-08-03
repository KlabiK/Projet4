<?php $title = 'Interface admin' ;?>
<?php if($_SESSION['lvl'] ==1)
{ ?>
    <?php ob_start(); ?>
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=listArticles">Chapitres</a>
        </li>
        <?php if(isset($_SESSION['user'])){?>
        <li class="nav-item">
        <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
        </li>
        <?php } ?>
    </ul>
    <?php $menu = ob_get_clean();?>

    <?php ob_start(); ?>

    <main class="container">
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
            <div class="col-10">
            
                <h1 class="text-center my-4">Billet simple pour l'Alaska</h1>
                <a href="index.php?action=addPage" class="btn btn-primary my-4">Ajouter un article</a>
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
                                <td><a href="index.php?action=editPage&id=<?= $chapitre['id'] ?>"class="btn btn-secondary my-2"> Modifier</a>
                                    <a href="index.php?action=supprPage&id=<?= $chapitre['id'] ?>"class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php 
                if($data){?>
                <h2 class="text-center my-5">Liste des commentaires signalés :</h2>
                <table class="table">
                    <thead>
                        <th rows="6">Chapitre</th>
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $com) {
                        ?>
                            <tr>
                                <td><?= $chapitre['title'] ?> </td>
                                <td><?= $com->author ?></td>
                                <td><?= $com->comment ?> </td>
                                <td><a href="index.php?action=editSignal&id=<?= $com->id ?>" class="btn btn-secondary my-2">Retrait signalement</a>
                                    <a href="index.php?action=supprSignal&id=<?= $com->id ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
    <?php $content = ob_get_clean();?>
    <?php require('template.php'); ?>
<?php } else {
     header('Location: index.php?action=home');
     $_SESSION['erreur'] ='Vous n\'êtes pas autorisé à accéder à cette page.';
} ?>