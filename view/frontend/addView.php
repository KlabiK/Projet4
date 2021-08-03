<?php $title = "Ajout d'un article"; ?>
<?php ob_start(); ?>
<ul class="navbar-nav ">
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="index.php?action=listArticles">Chapitres</a>
        </li>
    </ul>
<?php $menu = ob_get_clean();?>
<?php ob_start(); ?>
<div class="container">
    <div class="row">

    </div>
    <div class="my-2">
        <?php
        if (!empty($_SESSION['message'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div';
            $_SESSION['message'] = "";
        }
        ?>
    </div>
    <div class="row">
        <form method="POST" action="index.php?action=add" class="col-12">

            <div class="form-group">
                <input type="text" id="title" name="title" class="form-control text-center mt-4" placeholder="Nom du chapitre" required>
            </div>
            <div class="form-group">
                <textarea id="content" name="content" required>
          </textarea>
                <script>
                    tinymce.init({
                        selector: "content",
                        theme: "advanced",
                        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                        toolbar_mode: 'floating',
                        tinycomments_mode: 'embedded',
                        tinycomments_author: 'Author name',
                    });
                </script>
            </div>
            <h2>Synopsis</h2>
            <textarea id="synopsis" name="synopsis" required>
            </textarea>
            <button class="btn btn-primary my-4" type="submit">Enregistrer</button>
            <a class="btn btn-primary my-4 " href="index.php?action=admin">Chapitres</a>
        </form>

    </div>
</div>
<script src="https://cdn.tiny.cloud/1/py0pjsyd3dnwtiz4cmlg58l6awx363bocz2lblfyzwcu7kv6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>