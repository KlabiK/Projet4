 <?php $title = "Billet pour L'alaska"; ?>

<?php ob_start(); ?>
    <ul class="navbar-nav ">
        <li class="nav-item active">
            <a class="nav-link" href="index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item ">
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
        <h2 class=" text-center my-4" >Biographie </h2>
        <hr />
        <div class="row">
            <div class="col-4 my-4 mx-4">
                <img src=".\.\public/images/photo01.jpg" alt="Bootstrap" class="img-rounded" width="120%">
            </div>
            <div class="col-6 my-4 mx-5">
                <p>Pauvre  Gringoire  !  le  fracas  de  tous  les  gros  doubles  pé-tards de la Saint-Jean, la décharge de vingt arquebuses à croc, la détonation de cette fameuse serpentine de la Tour de Billy, qui, lors du siège de Paris, le dimanche 29 septembre 1465, tua sept Bourguignons d’un coup, l’explosion de toute la poudre à canon emmagasinée à la porte du Temple, lui eût moins rudement dé-chiré  les  oreilles,  en  ce  moment  solennel  et  dramatique,  que  ce  peu  de  paroles  tombées  de  la  bouche  d’un  huissier  :  Son  Émi-nence monseigneur le cardinal de Bourbon. </p>
            </div>
        </div>

    </div>
    <div class="container">
    <hr />
        <h2 class="text-center">Oeuvres</h2>
        <hr />
        <div class="row">

            <div class="col my-4">
                <p>Ce  n’est  pas  que  Pierre  Gringoire  craignît  monsieur  le  car-dinal ou le dédaignât. Il n’avait ni cette faiblesse ni cette outre-cuidance.  Véritable  éclectique,  comme  on  dirait  aujourd’hui,  Gringoire  était  de  ces  esprits  élevés  et  fermes,  modérés  et  cal-mes, qui savent toujours se tenir au milieu de tout (stare in di-midio  rerum),  et  qui  sont  pleins  de  raison  et  de  libérale  philo-sophie, tout en faisant état des cardinaux. Race précieuse et ja-mais  interrompue  de  philosophes  auxquels  la  sagesse,  comme  une  autre  Ariane,  semble  avoir  donné  une  pelote  de  fil  qu’ils  s’en vont dévidant depuis le commencement du monde à travers le labyrinthe des choses humaines. On les retrouve dans tous les temps,  toujours  les  mêmes,  c’est-à-dire  toujours  selon  tous  les  temps.</p>
            </div>
        </div>

    </div>
    <div class="container">
    <hr />
        <h2 class="text-center">Billet simple pour l'Alaska </h2>
        <hr />
        <div class="row">
            <div class="col-6 my-4 mx-4">
                <p>Il  n’y  avait  donc  ni  haine  du  cardinal,  ni  dédain  de  sa  pré-sence,  dans  l’impression  désagréable  qu’elle  fit  à  Pierre  Grin-goire.  Bien  au  contraire  ;  notre  poète  avait  trop  de  bon  sens  et  une souquenille trop râpée pour ne pas attacher un prix particu-lier à ce que mainte allusion de son prologue, et en particulier la glorification du dauphin fils du lion de France, fût recueillie par une oreille éminentissime. Mais ce n’est pas l’intérêt qui domine dans  la  noble  nature  des  poètes.</p>
            </div>
            <div class="col-4 my-4 mx-4">
                <img src=".\.\public/images/Alaska.jpg" alt="Bootstrap" class="img-rounded" width="120%">
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>