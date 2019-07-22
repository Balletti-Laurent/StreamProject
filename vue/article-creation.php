<?php
include '../configuration.php';
include '../controllers/controller-article-creation.php';
include 'header.php';
?>
<div id="background">
    <div class="spacebeforeFooter">
        <div class="row">
            <div class="col-md-8 mt-1 offset-md-2 text-center">
               
                <!-- Création d'un projet -->
                <h1 class="text-center">Création de projet</h1>
                <?php if ($isSuccess) { ?>
                    <p class="text-success text-center">Votre projet a bien été créé</p>
                    <?php
                }
                ?>
                <form method="POST" action="article-creation.php">
                    <div class="form-group">
                        <label for="title">Nom de votre projet de stream</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Renseignez le nom de votre projet" />
                        <p class="text-danger"> <?= isset($formError['title']) ? $formError['title'] : '' ?> </p>
                        <div class="userNameMessage"></div>
                    </div>
                    <p><label for="typeofstream">Type de stream :</label>
                        <select id="typeofstream" name="typeofstream">
                            <option selected disabled>Sélectionner un type de stream</option>
                            <?php foreach ($listtypeofstream as $typeofstreamdetail) { ?>
                                <option value=" <?= $typeofstreamdetail->id ?>"> <?= $typeofstreamdetail->title ?></option>
                            <?php } ?>
                        </select></p>
                    <p><label for="typeofgame">Type de jeu :</label>
                        <select id="typeofgame" name="typeofgame">
                            <option selected disabled>Sélectionner un type de jeu</option>
                            <?php foreach ($listtypeofgame as $typeofgamedetail) { ?>
                                <option value=" <?= $typeofgamedetail->id ?>"> <?= $typeofgamedetail->type ?></option>
                            <?php } ?>
                        </select></p>
                    <p><label for="department">Département :</label>
                        <select id="department" name="department">
                            <option selected disabled>Sélectionner un département</option>
                            <?php foreach ($listdepartment as $departmentdetail) { ?>
                                <option value=" <?= $departmentdetail->id ?>"> <?= $departmentdetail->title ?></option>
                            <?php } ?>
                        </select></p>
                    <div class="form-group">
                        <label for="description">Décrivez votre projet</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Renseignez la description de votre projet" />
                        <p class="text-danger"> <?= isset($formError['title']) ? $formError['title'] : '' ?> </p>
                        <div class="userNameMessage"></div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Enregistrer le projet</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
