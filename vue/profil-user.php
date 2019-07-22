<?php
include '../configuration.php';
include '../controllers/controller-profil-user.php';
include 'header.php';
?>

<div id="background">
    <div class="spaceBottom">

        <!-- Profil Utilisateur -->
        <div class="text-center col-12" >
            <h1>Profil de <?= $_SESSION['username'] ?></h1>
            <div class="col-md-8 offset-md-2 cadre">
                <p class="textcolor">Pseudo : </p>
                <p><?= $_SESSION['username'] ?></p>
                <p class="spaceBottom textcolor">Mail : </p>
                <p><?= $_SESSION['mail'] ?></p>
                <p class="textcolor">Description :</p>
                <p><?= $_SESSION['description'] ?></p>
                <p class="textcolor">Adresse de stream : </p>
                <p><?= $_SESSION['streamadress'] ?></p>
                <p><button class="btn btn-primary">Modifier le profil</button></p>
                <div id="hiddenForm" >

                    <!-- Formulaire de modification d'un profil -->
                    <form method="POST" action="profil-user.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Pseudo</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= $_SESSION['username'] ?>" />

                        </div>
                        <div class="form-group">
                            <label for="mail">Courriel</label>
                            <input type="mail" name="mail" class="form-control" id="mail" value="<?= $_SESSION['mail'] ?>" />
                            <div class="mailMessage"></div>
                        </div>
                        <div class="form-group">
                            <label for="mailVerify">Courriel (confirmation)</label>
                            <input type="mail" name="mailVerify" class="form-control" id="mailVerify" value="<?= $_SESSION['mail'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="password" >Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Renseignez votre mot de passe" />
                        </div>
                        <div class="form-group">
                            <label for="passwordVerify">Mot de passe (confirmation)</label>
                            <input type="password" name="passwordVerify" class="form-control" id="passwordVerify" placeholder="Confirmez votre mot de passe" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" value="<?= $_SESSION['description'] ?>" />

                        </div>
                        <div class="form-group">
                            <label for="streamadress">Adresse de stream (Twitch)</label>
                            <input type="text" name="streamadress" class="form-control" id="streamadress" value="<?= $_SESSION['streamadress'] ?>" />
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary spaceBottom">Enregistrer les modifications</button>
                    </form>
                </div>
                <a class="btn btn-danger" href="profil-user.php?deleteId=<?= $_SESSION['id'] ?>" name="delete">Supprimer le profil</a>
            </div>
        </div>
    </div>
</div>
<script src="../assets/javascript/script.js" type="text/javascript"></script>
<script src="../assets/javascript/editButton.js" type="text/javascript"></script>
<?php
include 'footer.php';
?>

