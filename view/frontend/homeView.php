<?php $title = "Billet pour L'alaska"; ?>
<?php ob_start(); ?>
        <li class="nav-item active font-weight-bold">
            <a class="nav-link" href="index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item ">
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
<?php $menu = ob_get_clean(); ?>
<?php ob_start(); ?>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-12">
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
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class=" text-center my-4 titreHome">BIOGRAPHIE</h2>
        <hr />
        <div class="row">
            <div class="col-4 my-4 mx-4">
                <img src="public/images/photo01.jpg" alt="Bootstrap" class="img-rounded">
            </div>
            <div class="col-6 my-4 mx-5">
               <p>Né le 19 février 1976 à Herblay, dans le Val-d’Oise, Jean Forteroche fait au cours de son enfance de fréquents séjours aux États-Unis, à New York, à Denver, et surtout à Portland (Oregon), qui devient le cadre de L’âme du mal. Il suit le Cours Simon à Paris en parallèle de ses études. Après le bac, petits boulots, Lettres Modernes à la fac.
                    En 1999, Jean écrit le 5° règne (qu’il ne soumet à aucun éditeur). Il devient libraire (avec un gilet vert) ce qui lui permet d’en savoir plus sur le monde de l’édition. Il s’inscrit également aux cours de criminologie dispensés par l’université Saint-Denis.
                    En 2000, il est toujours libraire et il commence à écrire L’Ame du Mal. 2001, il finit d’écrire L’Ame du Mal, en novembre il rencontre Michel Lafon.</p>
             </div>
      </div>
    </div>
    <div class="container">
    <hr />
        <h2 class="text-center titreHome">BIBLIOGRAPHIE</h2>
        <hr />
        <div class="row">
            <div class="col my-4">
               <ul>
                <li>Le 5° règne (Le Masque en 2003 Pocket en 2006, Le Masque en 2007)</li>
                <li>Le sang du temps (Michel Lafon en 2005, Pocket en 2007)</li>
                <li>Carnages (Pocket en 2006 – édition collector, Pocket en 2010)</li>
                <li>La promesse des ténèbres (Albin Michel en 2009, Pocket en 2011)</li>
                <li>L’empreinte sanglante (Fleuve Noir en 2009) Nouvelle intitulée « Le fracas de la viande chaude »</li>
                <li> Que ta volonté soit faites (Albin Michel en 2015, Pocket 2016)</li>
                <li>Un(e)secte (Albin Michel 2019, Pocket février 2021)</li>
            </ul>
          </div>
        </div>
    </div>
    <div class="container">
    <hr />
        <h2 class="text-center titreHome">BILLET SIMPLE POUR L'ALASKA</h2>
        <hr />
        <div class="row">
            <div class="col-6 my-4 mx-4">
                 <p>Miles Halter a seize ans mais n'a pas l'impression d'avoir vécu. Assoiffé d'expériences, il quitte le cocon familial pour le campus universitaire : ce sera le lieu de tous les possibles, de toutes les premières fois. Et de sa rencontre avec Alaska. La troublante, l'insaisissable Alaska Young, insoumise et fascinante.
                    Venez et marchez sur la banquise avec Miles....
                </p>
              </div>
            <div class="col-4 my-4 mx-4">
                <img src="public/images/Alaska.jpg" alt="Bootstrap" class="img-rounded">
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>