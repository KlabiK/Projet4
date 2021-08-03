<?php $title = "Modifications"; ?>
<?php ob_start(); ?>
<ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="articlesList.php">Chapitres</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
    </li>
</ul>
<?php $menu = ob_get_clean(); ?>
<?php ob_start(); ?>
<div class="container mt-2">
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
            <h1 class="my-4 text-center">Modifications du Chapitre</h1>
            <form method="POST" action="index.php?action=edit">
                <div class="form-group my-4 text-center">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= $chapitre->title ?>">

                </div>
                <div class="form-group my-4 text-center">
                    <textarea type="text" id="content" name="content" class="form-control">
                        <?= $chapitre->content ?>
                        </textarea>
                </div>
                <div class="form-group my-4 text-center">
                    <label for="title">Synopsis (255 caractères max)</label>
                    <input type="text" id="synopsis" name="synopsis" class="form-control" value=" <?= $chapitre->synopsis ?>">


                </div>
                <input type="hidden" name="id" value="<?= $chapitre->id ?>">
                <button class="btn btn-primary mb-4">Enregistrer</button>
            </form>
            <a class="btn btn-primary mb-4" href="index.php?action=admin">Chapitres</a>
        </div>
    </div>

</div>
<script src="https://cdn.tiny.cloud/1/py0pjsyd3dnwtiz4cmlg58l6awx363bocz2lblfyzwcu7kv6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 400
    });
</script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>