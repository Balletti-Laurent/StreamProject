<?php

//Déconnection
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'deconnexion') {
        session_destroy();
        header('Location:index.php');
        exit();
    }
}
// var_dump($_SERVER);
if ($_SERVER['REQUEST_URI'] == '/streamproject/vue/login.php' || $_SERVER['REQUEST_URI'] == '/streamproject/vue/register-user.php' || $_SERVER['REQUEST_URI'] == '/streamproject/vue/index.php' || $_SERVER['REQUEST_URI'] == '/streamproject/vue/') {

} else if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}