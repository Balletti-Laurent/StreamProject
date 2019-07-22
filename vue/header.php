<?php
include '../controllers/controller-header.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>StreamProject</title>
        <link href="../assets/css/style.css" rel="stylesheet" />
        <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> 
        <script src="../assets/javascript/jquery-3.2.1.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header id="header">
            <div class="row">
                <div class="col-md-12 mt-1 ">
                    <a href="index.php"><input type="image" class="mt-3 ml-3 float-left" src="../assets/images/logo.png" alt="streamproject"/></a>
                    <?php if (isset($_SESSION['isConnect']) && $_SESSION['isConnect']) { ?>
                        <a class="btn btn-dark mt-3 mr-3 float-right" href="profil-user.php" ><?= $_SESSION['username'] ?></a>
                        <a class="btn btn-dark mt-3 mr-3 float-right" href="?action=deconnexion">Déconnexion</a>
                        <a class="btn btn-dark mt-3 mr-3 float-right" href="article-user.php" >Mes projets</a>
                        <a class="btn btn-dark mt-3 mr-3 float-right" href="article-creation.php">Créer un projet</a>
                        <a class="btn btn-dark mt-3 mr-3 float-right" href="list-article.php">Recherche</a>
                    <?php } else { ?>
                        <a href="register-user.php"><input type="button" class="btn btn-dark mt-3 mr-3 float-right" value="Inscription"/></a>
                        <a href="login.php"><input type="button" class="btn btn-dark mt-3 mr-3 float-right" value="Connection"/></a>
                        <?php } ?>
                </div>
            </div>
        </header>  

