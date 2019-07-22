<?php

//Instanciation de l'objet 
$useraccount = new useraccount();

//J'initialise mon tableau d'erreur
$formError = array();

//On initialise les variables de stockage des informations pour éviter d'avoir des erreurs dans la vue
$username = '';
$mail = '';
$password = '';
$avatar = '';
$description = '';
$streamadress = '';
$id_103role = '';

//Si le login est isset
if (isset($_POST['login'])) {
    
    //Si le mail est isset
    if (isset($_POST['mail'])) {
        
            //On vérifie que le mail ne soit pas vide
        if (!empty($_POST['mail'])) {
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $mail = htmlspecialchars($_POST['mail']);
            } else {
                $formError['mail'] = 'Le courriel n\'est pas valide';
            }
        } else {
            $formError['mail'] = 'Veuillez renseigner un courriel';
        }
    }
    
    //Si le password est isset
    if (isset($_POST['password'])) {
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $formError['password'] = 'Veuillez renseigner un mot de passe';
        }
    }

    if (count($formError) == 0) {
        $useraccount->mail = $mail;
        $hash = $useraccount->getHashFromUser();
        if (is_object($hash)) {

            $isConnect = password_verify($password, $hash->password);
           
            //l'utilisateur est connecté
            if ($isConnect) {
                $userInfo = $useraccount->getUserInfo();

                $_SESSION['username'] = $userInfo->username;
                $_SESSION['mail'] = $useraccount->mail;
                $_SESSION['avatar'] = $userInfo->avatar;
                $_SESSION['description'] = $userInfo->description;
                $_SESSION['streamadress'] = $userInfo->streamadress;
                $_SESSION['id_103role'] = $userInfo->id_103role;
                $_SESSION['id'] = $userInfo->id;
                $_SESSION['isConnect'] = true;
                header('Location:profil-user.php');
                exit();
            } else {
                $formError['error'] = 'Votre adresse mail ou votre mot de passe est incorrecte';
            }
        } else {
            $formError['error'] = 'Votre adresse mail ou votre mot de passe est incorrecte';
        }
    }
}
?>