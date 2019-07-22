<?php

//Instanciation de l'objet 
$article = new article();
$article->id_103useraccount = $_SESSION['id'];

//Suppression de l'article
$isDelete = FALSE;
if (!empty($_GET['idDelete'])) {
    $article->id = htmlspecialchars($_GET['idDelete']);
    if ($article->removeArticle()) {
        $isDelete = TRUE;
    }
}

$articlesListUser = $article->showArticleOfUser();
