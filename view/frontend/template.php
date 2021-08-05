<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href=".\.\public/css/style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <header>
    <div class="bg-dark">
           <div class="container">
               <div class="row">  
                   <nav class="col navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="index.php?action=home">Jean Forteroche</a>
                    <div id="navbarContent" class="collapse navbar-collapse">
                        <?= $menu ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    </header>
    <?= $content ?>
    <div class="jumbotron footer">
        <div class="container">
            <div class="row mt-3">
                <div class="col text-center ">
                    <ul class="list-inline ">
                        <li class="list-inline-item font-weight-bold">À propos</li>
                        <li class="list-inline-item font-weight-bold"> Vie privée</li>
                        <li class="list-inline-item font-weight-bold">Conditions d'utilisations</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>