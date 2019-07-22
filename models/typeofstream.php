<?php

//department

class typeofstream extends database {

//attributs

    public $id = 0;
    public $title = '';

    function __construct() {
        parent::__construct();
    }

    /**
     * methode permettant de recuperer la liste des types de streams
     * @return array
     */
    public function getTypeOfStreamList() {
        $result = array();
        $query = 'SELECT * FROM `103typeofstream` ORDER BY `title` ASC';
        $Resultquery = $this->db->query($query);
        if (is_object($Resultquery)) {
            $result = $Resultquery->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

}
