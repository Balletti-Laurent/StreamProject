<?php
include '../configuration.php';
include '../controllers/controller-article-user.php';
include 'header.php'
?>
<div id="background">
    <div class="spaceBottom">
                <h1 class="text-center spaceBottom">Liste des projets</h1>
                                                <?php if ($isDelete) { ?>
                        <p class="text-success text-center">Votre projet a été supprimer</p>
                        <?php
                    }
                    ?>
                        
        <!-- Liste des projet de l'utilisateur -->
        <div class="col-md-8 mt-1 offset-md-2 text-center">

            <?php foreach ($articlesListUser as $article) { ?>
                <div class="cadre spaceBottom">
                    <p class="textcolor">Nom du projet</p>
                    <p><?= $article->title ?></p>
                    <p class="textcolor">Type de stream</p>
                    <p><?= $article->typeofstreamtitle ?></p>
                    <p class="textcolor">Type de jeu</p>
                    <p><?= $article->typeofgame ?></p>
                    <p class="textcolor">Département</p>
                    <p><?= $article->departmenttitle ?></p>
                    <p class="textcolor">Description du projet</p>
                    <p><?= $article->description ?></p>
                    <p class="textcolor">Date de création du projet</p>
                    <p><?= $article->date ?></p>
                    
                    <p><a class="btn btn-primary" href="update-article.php?id=<?= $article->id ?>" name="update">Modifier le projet</a></p>
                    <p><a class="btn btn-danger" href="article-user.php?idDelete=<?= $article->id ?>" name="delete">Supprimer le projet</a></p>
                </div>
            <?php } ?>
        </div>
        <div class="projetBottom"> 
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>