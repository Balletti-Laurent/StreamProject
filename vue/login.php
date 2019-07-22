<?php
include '../configuration.php';
include '../controllers/controller-login.php';
include 'header.php';
?>
<div id="background">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 spacebeforeFooter" >
                <h1 class="text-center">Connection</h1>
                <form method="POST" action="#">
                    <div class="form-group">
                        <label for="mail">Adresse mail</label>
                        <input type="mail" name="mail" class="form-control" id="mail"  placeholder="Renseignez votre courriel" />
                        <p class="text-danger"> <?= isset($formError['mail']) ? $formError['mail'] : '' ?> </p>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password"  placeholder="Renseignez votre mot de passe" />
                        <p class="text-danger"> <?= isset($formError['password']) ? $formError['password'] : '' ?> </p>
                        <p class="text-danger"> <?= isset($formError['error']) ? $formError['error'] : '' ?> </p>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Se connecter</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php
include 'footer.php';
?>
