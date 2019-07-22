<?php

//department

class department extends database {

//attributs

    public $id = 0;
    public $title = '';

    function __construct() {
        parent::__construct();
    }

    /**
     * methode permettant de recuperer la liste des départements
     * @return array
     */
    public function getDepartmentList() {
        $result = array();
        $query = 'SELECT * FROM `103department` ORDER BY `title` ASC';
        $Resultquery = $this->db->query($query);
        if (is_object($Resultquery)) {
            $result = $Resultquery->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

}
