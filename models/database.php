<?php

//Classe permettant de se connecter a la base de donnée
class database {

    protected $db;

    function __construct() {
        
        //protection contre l'erreur
        //si il n'y a pas d'erreur
        try {
            $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=utf8', LOGIN, PASSWORD);
            //si il y a une erreur
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function __destruct() {
        $this->db = NULL;
    }

}

?>