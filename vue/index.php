<?php
include '../configuration.php';
include 'header.php';
?>
<div id="background">
    <div class="spaceIndex">
        <div class="row">
            <div class="col-md-8 mt-1 offset-md-2 text-center">
                <p class="cadre">StreamProjet est destiné aux streamer. Vous pouvez créer et réaliser vos projets de stream avec la communauté. Aussi bien
                    jouer avec d'autres streamer pour animer vos stream ou faire un stream caritatif afin d'aider une association, laisser 
                    libre cours a votre imagination.
                </p>
            </div>
        </div>
    </div>

    <!-- Caroussel -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <HR align=center size=10 width="70%">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../assets/images/caroussel1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../assets/images/caroussel2.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../assets/images/caroussel3.jpg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../assets/images/caroussel4.png" alt="fouth slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <HR align=center size=10 width="70%">
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>