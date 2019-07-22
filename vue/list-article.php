<?php
include '../configuration.php';
include '../controllers/controller-list-article.php';
include 'header.php'
?>
<div id="background">
    
    <!-- boutton de recherche -->
    <div class="row">
        <div class="col-md-12 text-center">
            <form class="mt-3" action="list-article.php" method="POST">
                <input type="search" name="search" />
                <input class="btn btn-dark" type="submit" name="searchSubmit" value ="Rechercher" />
            </form>
            <?php
            if (isset($_POST['searchSubmit'])) {
                if (isset($_POST['search'])) {
                    ?>
                    <h1 class="text-center">Liste des projets</h1>
                    <?php foreach ($resultSearch as $article) { ?>
                        <div class="col-md-8 mt-1 offset-md-2 text-center">
                            <div class="cadre spaceBottom">
                                <p class="textcolor">Nom du streamer</p>
                                <p><?= $article->username ?></p>
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
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                }
            } else {
                ?>
                <h1 class="text-center">Liste des projets</h1>
                <?php foreach ($articlesList as $article) { ?>
                    <div class="col-md-8 mt-1 offset-md-2 text-center">
                        <div class="cadre spaceBottom">
                            <p class="textcolor">Nom du streamer</p>
                            <p><?= $article->username ?></p>
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
                        </div>
                    </div>
                <?php } ?>  
                <!-- pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>" ><a class="page-link" href="list-article.php?page=<?= $page - 1 ?>">&lt;</a></li>
                        <?php for ($i = 1; $i <= $numberOfPage; $i++) { ?>
                            <li class = "page-item"><a class = "page-link" href = "list-article.php?page=<?= $i ?>"><?= $i ?></a></li>
                            <?php
                        }
                        ?>
                        <li class="page-item <?= $page == $numberOfPage ? 'disabled' : '' ?>"><a class="page-link" href="list-article.php?page=<?= $page + 1 ?>">&gt;</a></li>
                    </ul>
                </nav>

                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>