<?php
include '../configuration.php';
include '../controllers/controller-update-article.php';
include 'header.php'
?>

<div id="background">
    <h1 class="text-center">Modifier le projet</h1>
    <?php if ($isSuccess) { ?>
        <p class="text-success text-center">Votre projet a bien été modifier</p>
        <?php
    }
    ?>

    <!-- Formulaire de modification d'un profil -->
    <div class="text-center">
        <div class="row">
            <div class="col-md-8 mt-1 offset-md-2 text-center">
                <form method="POST" >
                    <div class="form-group">
                        <label for="title">Nom de votre projet de stream</label>
                        <input type="text" name="title" class="form-control" id="title" value="<?= $articleId->title ?>" />
                        <p class="text-danger"> <?= isset($formError['title']) ? $formError['title'] : '' ?> </p>
                        <div class="userNameMessage"></div>
                    </div>
                    <p><label for="typeofstream">Type de stream :</label>
                        <select id="typeofstream" name="typeofstream">
                            <option disabled>Sélectionner un type de stream</option>
                            <?php foreach ($listtypeofstream as $typeofstreamdetail) { ?>
                                <option <?php if ($articleId->typeofstreamtitle == $typeofstreamdetail->title) { ?> selected <?php } ?> value=" <?= $typeofstreamdetail->id ?>"> <?= $typeofstreamdetail->title ?></option>
                            <?php } ?>
                        </select></p>
                    <p><label for="typeofgame">Type de jeu :</label>
                        <select id="typeofgame" name="typeofgame">
                            <option disabled>Sélectionner un type de jeu</option>
                            <?php foreach ($listtypeofgame as $typeofgamedetail) { ?>
                                <option <?php if ($articleId->typeofgame == $typeofgamedetail->type) { ?> selected <?php } ?> value=" <?= $typeofgamedetail->id ?>"> <?= $typeofgamedetail->type ?></option>
                            <?php } ?>
                        </select></p>
                    <p><label for="department">Département :</label>
                        <select id="department" name="department">
                            <option disabled>Sélectionner un département</option>
                            <?php foreach ($listdepartment as $departmentdetail) { ?>
                                <option <?php if ($articleId->departmenttitle == $departmentdetail->title) { ?> selected <?php } ?>  value=" <?= $departmentdetail->id ?>"> <?= $departmentdetail->title ?></option>
                            <?php } ?>
                        </select></p>
                    <div class="form-group">
                        <label for="description">Décrivez votre projet</label>
                        <input type="text" name="description" class="form-control" id="description" value="<?= $articleId->description ?>" />
                        <p class="text-danger"> <?= isset($formError['title']) ? $formError['title'] : '' ?> </p>
                        <div class="userNameMessage"></div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary spaceBottom">Enregistrer le projet</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>