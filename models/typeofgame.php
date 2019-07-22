<?php

//department

class typeofgame extends database {

//attributs

    public $id = 0;
    public $type = '';

    function __construct() {
        parent::__construct();
    }

    /**
     * methode permettant de recuperer la liste des types de jeux
     * @return array
     */
    public function getTypeOfGameList() {
        $result = array();
        $query = 'SELECT * FROM `103typeofgame` ORDER BY `type` ASC';
        $Resultquery = $this->db->query($query);
        if (is_object($Resultquery)) {
            $result = $Resultquery->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

}
