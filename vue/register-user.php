<?php
include '../configuration.php';
include '../controllers/controller-register-user.php';
include 'header.php';
?>
<div id="background">
    <div class="container spaceBottom">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Inscription</h1>

                <?php if ($isSuccess) { ?>
                    <p class="text-success text-center">Inscription effectué ! Vous povez maintenant vous connecter.</p>
                    <?php
                }
                ?>
                    
                <!-- Formulaire de création d'un profil -->
                <form method="POST" action="register-user.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Pseudo</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Renseignez votre pseudo" />
                        <p class="text-danger"> <?= isset($formError['username']) ? $formError['username'] : '' ?> </p>
                        <div class="userNameMessage"></div>
                    </div>
                    <div class="form-group">
                        <label for="mail">Courriel</label>
                        <input type="mail" name="mail" class="form-control" id="mail" placeholder="Renseignez votre courriel" />
                        <p class="text-danger"> <?= isset($formError['mail']) ? $formError['mail'] : '' ?> </p>
                        <div class="mailMessage"></div>
                    </div>
                    <div class="form-group">
                        <label for="mailVerify">Courriel (confirmation)</label>
                        <input type="mail" name="mailVerify" class="form-control" id="mailVerify" placeholder="Confirmez votre courriel" />
                        <p class="text-danger"> <?= isset($formError['mailVerify']) ? $formError['mailVerify'] : '' ?> </p>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Renseignez votre mot de passe" />
                        <p class="text-danger"> <?= isset($formError['password']) ? $formError['password'] : '' ?> </p>
                    </div>
                    <div class="form-group">
                        <label for="passwordVerify">Mot de passe (confirmation)</label>
                        <input type="password" name="passwordVerify" class="form-control" id="passwordVerify" placeholder="Confirmez votre mot de passe" />
                        <p class="text-danger"> <?= isset($formError['passwordVerify']) ? $formError['passwordVerify'] : '' ?> </p>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" name="description" class="form-control" id="description" placeholder="Renseignez votre descrition" /></textarea>
                        <p class="text-danger"> <?= isset($formError['description']) ? $formError['description'] : '' ?> </p>
                        <div class="descriptionMessage"></div>
                    </div>
                    <div class="form-group">
                        <label for="streamadress">Adresse de stream (Twitch)</label>
                        <input type="text" name="streamadress" class="form-control" id="streamadress" placeholder="Renseignez votre adresse de stream" />
                        <p class="text-danger"> <?= isset($formError['streamadress']) ? $formError['streamadress'] : '' ?> </p>
                        <div class="streamAdressMessage"></div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">S'enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../assets/javascript/script.js" type="text/javascript"></script>
<?php
include 'footer.php';
?>

