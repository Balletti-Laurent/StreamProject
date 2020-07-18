<?php

//Appel AJAX pour le mail
if (isset($_POST['mailTest'])) {
    include '../configuration.php';

    //Instanciation de l'objet useraccount
    $usermail = new useraccount();

    $usermail->mail = htmlspecialchars($_POST['mailTest']);
    echo $usermail->checkFreeMail();
} else {

//Validation du formulaire   
//J'initialise mon tableau d'erreur
    $formError = array();
    $isSuccess = FALSE;

//On initialise les variables de stockage des informations pour éviter d'avoir des erreurs dans la vue
    $username = '';
    $mail = '';
    $avatar = '';
    $description = '';
    $streamadress = '';


//Déclaration regex username
    $regexUsername = '/^[0-9a-zA-Z\- ]+$/';

//Déclaration regex regexAdressTwitch
    $regexAdressTwitch = '#https?://[a-zA-Z0-9-\.]+\.[a-zA-Z]{2}(/\S*)?#';


//Quand on s'enregistre
//si le submit est isset
    if (isset($_POST['submit'])) {

//On vérifie que le pseudo n'est pas vide.
        if (!empty($_POST['username'])) {

// Si lastname ne respecte pas les conditions de ma regex alors je stock un message d'erreur dans mon tableau formError
            if (preg_match($regexUsername, $_POST['username'])) {
                $username = htmlspecialchars($_POST['username']);
            } else {
                $formError['username'] = 'La saisie est invalide, votre pseudo doit être composé de lettres et/ou de chiffres.';
            }
        } else {
            $formError['username'] = 'Veuillez renseigner un pseudo';
        }

//On vérifie que l'adresse mail est renseigné, qu'il correspond à la confirmation et qu'il a la bonne forme.
        if (!empty($_POST['mail']) && !empty($_POST['mailVerify'])) {
            if ($_POST['mail'] == $_POST['mailVerify']) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $mail = htmlspecialchars($_POST['mail']);
                } else {
                    $formError['mail'] = 'Le courriel n\'est pas valide';
                }
            } else {
                $formError['mail'] = 'Les courriels ne sont pas identiques';
            }
        } else {
            $formError['mail'] = 'Veuillez renseigner un courriel';
            $formError['mailVerify'] = 'Veuillez confirmer le courriel';
        }

//On vérifie que le mot de passe est renseigné et qu'il est identique à la confirmation. On le hash avant de le mettre en base de données. 
        if (!empty($_POST['password']) && !empty($_POST['passwordVerify'])) {
            if ($_POST['password'] == $_POST['passwordVerify']) {

//On hash le passeword
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            } else {
                $formError['password'] = 'Les mots de passe ne sont pas identiques';
            }
        } else {
            $formError['password'] = 'Veuillez renseigner un mot de passe';
            $formError['passwordVerify'] = 'Veuillez confirmer le mot de passe';
        }

//On vérifie que streamadress n'est pas vide.
        if (!empty($_POST['description'])) {

// Si description ne respecte pas les conditions du htmlspecialchars alors je stock un message d'erreur dans mon tableau formError
            if ($description = htmlspecialchars($_POST['description'])) {
                
            } else {
                $formError['description'] = 'La saisie est invalide, votre description doit être composé de lettres et/ou de chiffres.';
            }
        } else {
            $formError['description'] = 'Veuillez renseigner une description';
        }

//On vérifie que streamadress n'est pas vide.        
        if (!empty($_POST['streamadress'])) {

// Si description ne respecte pas les conditions de ma regex alors je stock un message d'erreur dans mon tableau formError
            if (preg_match($regexAdressTwitch, $_POST['streamadress'])) {
                $streamadress = htmlspecialchars($_POST['streamadress']);
            } else {
                $formError['streamadress'] = 'La saisie est invalide, merci de renseigner votre adresse de stream';
            }
        } else {
            $formError['streamadress'] = 'Veuillez renseigner une adresse de stream';
        }

//S'il n'y a pas d'erreur, j'enregistre l'utilisateur
        if (count($formError) == 0) {



            $useraccount = new useraccount();
//Insertion des information renseignées du formulaire dans les attributs de l'objet
            $useraccount->username = $username;
            $useraccount->mail = $mail;
            $useraccount->password = $password;
            $useraccount->description = $description;
            $useraccount->streamadress = $streamadress;
            if ($useraccount->addUser()) {

                $isSuccess = TRUE;
            }
        }
    }
}
?>