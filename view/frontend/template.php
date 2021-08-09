<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<link href="public/CSS/style.css" rel="stylesheet" />
</head>
<body>
  <header class="mx-8">
   <?php if($_SESSION['lvl']==1){?>
  <div class="bg-light" id="adminBack">
    <?php
    }else
{
    ?>
    <div class="bg-dark">
       <?php }?>
           <div class="container">
               <div class="row">
                 <?php if($_SESSION['lvl']==1){?>
        		 <nav class="col navbar navbar-expand-sm navbar-light">
                <?php }else{?>
                   <nav class="col navbar navbar-expand-md navbar-dark">
                 <?php } ?>
                    <a class="navbar-brand menuadmin" href="index.php?action=home">Jean Forteroche</a>
                    <div id="navbarContent" class="collapse navbar-collapse menuadmin">
                      <ul class="navbar-nav" id="menuClassique">
                        <?= $menu ?>
                      </ul>
                    </div>
                </nav>
          </div>
      </div>
    </div>
   </header>
    <div id="contenu">
      <?= $content ?>
    </div>
    <div class="jumbotron footer">
        <div class="container">
            <div class="row mt-3">
                <div class="col text-center ">
                 <p id="footerP">Site créé dans le cadre d'un projet étudiant</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>