<?php

//model useraccount

class useraccount extends database {

//attributs

    public $id = 0;
    public $username = '';
    public $mail = '';
    public $password = '';
    public $avatar = '';
    public $description = '';
    public $streamadress = '';
    public $id_103role = 2; //2 est l'utilisateur

// Conection à la base de donnée initialisé dans la classe database

    function __construct() {
        parent::__construct();
    }

    /**
     * Méthode qui permet à un utilisateur de s'enregistrer sur le site
     * @return type
     */
    public function addUser() {
//On insert les données du patient à l'aide de la requête INSERT INTO et le nom des champs de la table
        $query = 'INSERT INTO `103useraccount` (`username`,`mail`,`password`,`description`,`streamadress`,`id_103role`) '
                . 'VALUE (:username, :mail, :password, :description, :streamadress, 2)';
        $result = $this->db->prepare($query);
//bindValue attribut une valeur
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->bindValue(':streamadress', $this->streamadress, PDO::PARAM_STR);
        //On execute la requête
        return $result->execute();
    }

    /**
     * Méthode qui vérifie si une adresse mail est libre. 
     * 0 : L'adresse mail n'existe pas
     * 1 : Elle existe
     * @return type
     */
    function checkFreeMail() {
//verifie si l'adresse mail n'existe pas
        $query = 'SELECT COUNT(*) AS `nbMail` FROM `103useraccount` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        $checkFreeMail = $result->fetch(PDO::FETCH_OBJ);
        return $checkFreeMail->nbMail;
    }

    /**
     * Méthode qui retourne le hashage du mot de passe du compte sélectionné.
     * @return type
     */
    function getHashFromUser() {
        $query = 'SELECT `password` FROM `103useraccount` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui récupère les infos utiles de l'utilisateur après sa connection
     * @return type
     */
    function getUserInfo() {
        $query = 'SELECT * FROM `103useraccount` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

//    /**
//     * methode permettant de recuperer un profil utilisateur
//     * @return type
//     */
//    public function getShowUserProfil() {
//        $query = 'SELECT * FROM `useraccount` WHERE `id`= :id';
//        $result = $this->db->prepare($query);
//        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
////si la requete c'est bien executé alors on rempli $returnArray avec un objet         
//        if ($result->execute()) {
////renvoye un tableau d'objet
//            $return = $result->fetch(PDO::FETCH_OBJ);
//        }
////si $return est un objet alors on hydrate       
//        if (is_object($return)) {
//            $this->username = $return->username;
//            $this->mail = $return->mail;
//            $this->password = $return->password;
//            $this->avatar = $return->avatar;
//            $this->description = $return->description;
//            $this->streamadress = $return->streamadress;
//            $isOk = TRUE;
//        }
//        return $isOk;
//    }

    /**
     * methode permettant de modifier un profil utilisateur
     * @return type
     */
    public function modifyProfilUser() {
        $query = 'UPDATE `103useraccount` SET `username`=:username, `mail`=:mail, `password`=:password, '
                . ' `description`=:description, `streamadress`=:streamadress WHERE `id`= :id';
        $result = $this->db->prepare($query);
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->bindValue(':streamadress', $this->streamadress, PDO::PARAM_STR);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * méthode pour supprimer un utilisateur
     * @return type
     */
    public function deleteUser() {
        $query = 'DELETE FROM `103useraccount` WHERE `id`=:id';
        $result = $this->db->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }

    public function __destruct() {
        parent::__destruct();
    }

}

?>
    