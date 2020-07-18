<?php

//Instanciation de l'objet 
$typeofstream = new typeofstream();
$listtypeofstream = $typeofstream->getTypeOfStreamList();

//Instanciation de l'objet 
$typeofgame = new typeofgame();
$listtypeofgame = $typeofgame->getTypeOfGameList();

//Instanciation de l'objet 
$department = new department();
$listdepartment = $department->getDepartmentList();

//Instanciation de l'objet 
$article = new article();

//J'initialise mon tableau d'erreur
$formError = array();

$isSuccess = FALSE;

$title = '';
$description = '';
$id_103department = '';
$id_103typeofstream = '';
$id_103typeofgame = '';

//Déclaration regex title
$regexTitle = '/^[0-9a-zA-Z\-\'éè ]+$/';

if (isset($_POST['submit'])) {

//On vérifie que le titre n'est pas vide
    if (!empty($_POST['title'])) {

// Si lastname ne respecte pas les conditions de ma regex alors je stock un message d'erreur
// dans mon tableau formError
        if (preg_match($regexTitle, $_POST['title'])) {
            $title = htmlspecialchars($_POST['title']);
        } else {
            $formError['title'] = 'La saisie est invalide, votre titre de projet doit être composé de lettres.';
        }
    } else {
        $formError['title'] = 'Veuillez renseigner un titre de projet';
    }

//On vérifie que description n'est pas vide.
    if (!empty($_POST['description'])) {

// Si description ne respecte pas les conditions du htmlspecialchars alors je stock un message d'erreur dans mon tableau formError
        if ($description = htmlspecialchars($_POST['description'])) {
            
        } else {
            $formError['description'] = 'La saisie est invalide, votre description doit être composé de lettres et/ou de chiffres.';
        }
    } else {
        $formError['description'] = 'Veuillez renseigner une description';
    }

    //On vérifie que typeofstream n'est pas vide et qu'il a une valeur numérique
    if (!empty($_POST['typeofstream']) && is_numeric($_POST['typeofstream'])) {
        $id_103typeofstream = $_POST['typeofstream'];
    } else {
        $formError['typeofstream'] = 'Veuillez renseigner un type de stream';
    }

    //On vérifie que department n'est pas vide et qu'il a une valeur numérique
    if (!empty($_POST['department']) && is_numeric($_POST['department'])) {
        $id_103department = $_POST['department'];
    } else {
        $formError['department'] = 'Veuillez renseigner un département';
    }

    //On vérifie que typeofgame n'est pas vide et qu'il a une valeur numérique
    if (!empty($_POST['typeofgame']) && is_numeric($_POST['typeofgame'])) {
        $id_103typeofgame = $_POST['typeofgame'];
    } else {
        $formError['typeofgame'] = 'Veuillez renseigner un type de stream';
    }

    if (count($formError) == 0) {

        $article->id = $_GET['id'];
        $article->title = $title;
        $article->description = $description;
        $article->id_103department = $id_103department;
        $article->id_103typeofstream = $id_103typeofstream;
        $article->id_103typeofgame = $id_103typeofgame;
        if ($article->updateArticleUser()) {
            $isSuccess = TRUE;
        }
    }
}

$article->id = $_GET['id'];
$articleId = $article->showArticleById();
?>
