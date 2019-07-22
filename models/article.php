<?php

//department

class article extends database {

//attributs

    public $id = 0;
    public $title = '';
    public $description = '';
    public $dateannoncement = '0000-00-00';
    public $id_103useraccount = 0;
    public $id_103department = 0;
    public $id_103typeofstream = 0;
    public $id_103typeofgame = 0;

    function __construct() {
        parent::__construct();
    }

    /**
     * Méthode qui permet à un utilisateur d'enregistrer un nouveau projet
     * @return type
     */
    public function addArticle() {
        $query = 'INSERT INTO `103article` (`title`,`description`,`dateannoncement`,`id_103useraccount`,`id_103department`,`id_103typeofstream`,`id_103typeofgame`) VALUE (:title, :description, NOW(), :id_103useraccount, :id_103department, :id_103typeofstream, :id_103typeofgame)';
//marqueur nominatif = requete préparé (prepare(query)
        $result = $this->db->prepare($query);
        $result->bindValue(':title', $this->title, PDO::PARAM_STR);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->bindValue(':id_103useraccount', $this->id_103useraccount, PDO::PARAM_INT);
        $result->bindValue(':id_103department', $this->id_103department, PDO::PARAM_INT);
        $result->bindValue(':id_103typeofstream', $this->id_103typeofstream, PDO::PARAM_INT);
        $result->bindValue(':id_103typeofgame', $this->id_103typeofgame, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * methode pour filtrer les projet de l'utilisateur
     * @return type
     */
    public function showArticleOfUser() {
        $result = array();
        $query = 'SELECT `103article`.`id`, `103article`.`title`, `description`, DATE_FORMAT(`103article`.`dateannoncement`, "%d/%m/%Y") AS `date`, '
                . '`103department`.`title` AS `departmenttitle`, `103typeofstream`.`title` AS `typeofstreamtitle`, `103typeofgame`.`type` AS `typeofgame` '
                . 'FROM `103article` '
                . 'INNER JOIN `103typeofstream` '
                . 'ON `103article`.`id_103typeofstream` = `103typeofstream`.`id` '
                . 'INNER JOIN `103typeofgame` '
                . 'ON `103article`.`id_103typeofgame` = `103typeofgame`.`id` '
                . 'INNER JOIN `103department` '
                . 'ON `103article`.`id_103department` = `103department`.`id` '
                . 'WHERE `103article`.`id_103useraccount`= :id_103useraccount';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id_103useraccount', $this->id_103useraccount, PDO::PARAM_INT);
        if ($queryResult->execute()) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * methode pour filtrer les projet de l'utilisateur par id
     * @return type
     */
    public function showArticleById() {
        $result = array();
        $query = 'SELECT `103article`.`id`, `103article`.`title`, `description`, DATE_FORMAT(`103article`.`dateannoncement`, "%d/%m/%Y") AS `date`, '
                . '`103department`.`title` AS `departmenttitle`, `103typeofstream`.`title` AS `typeofstreamtitle`, `103typeofgame`.`type` AS `typeofgame` '
                . 'FROM `103article` '
                . 'INNER JOIN `103typeofstream` '
                . 'ON `103article`.`id_103typeofstream` = `103typeofstream`.`id` '
                . 'INNER JOIN `103typeofgame` '
                . 'ON `103article`.`id_103typeofgame` = `103typeofgame`.`id` '
                . 'INNER JOIN `103department` '
                . 'ON `103article`.`id_103department` = `103department`.`id` '
                . 'WHERE `103article`.`id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($queryResult->execute()) {
            $result = $queryResult->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * Méthode permetant de modifier le le projet du profil
     * @return type
     */
    public function updateArticleUser() {
        $query = $this->db->prepare('UPDATE `103article` '
                . 'SET `title`=:title, `description`=:description, `id_103department`=:id_103department, '
                . '`id_103typeofstream`=:id_103typeofstream, `id_103typeofgame`=:id_103typeofgame '
                . 'WHERE `id`=:id');
        $query->bindValue(':title', $this->title, PDO::PARAM_STR);
        $query->bindValue(':description', $this->description, PDO::PARAM_STR);
        $query->bindValue(':id_103department', $this->id_103department, PDO::PARAM_INT);
        $query->bindValue(':id_103typeofstream', $this->id_103typeofstream, PDO::PARAM_INT);
        $query->bindValue(':id_103typeofgame', $this->id_103typeofgame, PDO::PARAM_INT);
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $query->execute();
    }

    /**
     * Fonction permetant de supprimer un projet
     * @return type
     */
    public function removeArticle() {
        $query = 'DELETE FROM `103article`
                  WHERE `id` = :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result = $queryResult->execute();

        return $result;
    }

    /**
     * methode pour optenir les projet de l'utilisateur
     * @return type
     */
    public function getArticleList() {
        $result = array();
        $query = 'SELECT `103useraccount`.`username`, `103article`.`title`, `103article`.`description`, DATE_FORMAT(`103article`.`dateannoncement`, "%d/%m/%Y") AS `date`, '
                . '`103department`.`title` AS `departmenttitle`, `103typeofstream`.`title` AS `typeofstreamtitle`, `103typeofgame`.`type` AS `typeofgame` '
                . 'FROM `103article` '
                . 'INNER JOIN `103typeofstream` '
                . 'ON `103article`.`id_103typeofstream` = `103typeofstream`.`id` '
                . 'INNER JOIN `103typeofgame` '
                . 'ON `103article`.`id_103typeofgame` = `103typeofgame`.`id` '
                . 'INNER JOIN `103department` '
                . 'ON `103article`.`id_103department` = `103department`.`id` '
                . 'INNER JOIN `103useraccount` '
                . 'ON `103article`.`id_103useraccount` = `103useraccount`.`id` ';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($queryResult->execute()) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * méthode pour recherche un projet
     * @param type $search
     * @return type
     */
    public function articleSearch($search) {
        $query = 'SELECT `103useraccount`.`username`, `103article`.`title`, `103article`.`description`, DATE_FORMAT(`103article`.`dateannoncement`, "%d/%m/%Y") AS `date`, '
                . '`103department`.`title` AS `departmenttitle`, `103typeofstream`.`title` AS `typeofstreamtitle`, `103typeofgame`.`type` AS `typeofgame` '
                . 'FROM `103article` '
                . 'INNER JOIN `103typeofstream` '
                . 'ON `103article`.`id_103typeofstream` = `103typeofstream`.`id` '
                . 'INNER JOIN `103typeofgame` '
                . 'ON `103article`.`id_103typeofgame` = `103typeofgame`.`id` '
                . 'INNER JOIN `103department` '
                . 'ON `103article`.`id_103department` = `103department`.`id` '
                . 'INNER JOIN `103useraccount` '
                . 'ON `103article`.`id_103useraccount` = `103useraccount`.`id` '
                . 'WHERE `103article`.`title` LIKE :search  OR `103useraccount`.`username` LIKE :search ';
        $query = $this->db->prepare($query);
        $query->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        if ($query->execute()) {
            $result = $query->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * Méthode pour compter le nombre de pages pour la pagination
     * @return type
     */
    public function paging() {
        $query = 'SELECT COUNT(`id`) AS `countResult` FROM `103article`';
        $total = $this->db->query($query);
        if (is_object($total)) {
            $result = $total->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * methode qui permet la pagination
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getArticlesForPaging($limit, $offset) {
        $result = array();
        $query = 'SELECT `103useraccount`.`username`, `103article`.`title`, `103article`.`description`, DATE_FORMAT(`103article`.`dateannoncement`, "%d/%m/%Y") AS `date`, '
                . '`103department`.`title` AS `departmenttitle`, `103typeofstream`.`title` AS `typeofstreamtitle`, `103typeofgame`.`type` AS `typeofgame` '
                . 'FROM `103article` '
                . 'INNER JOIN `103typeofstream` '
                . 'ON `103article`.`id_103typeofstream` = `103typeofstream`.`id` '
                . 'INNER JOIN `103typeofgame` '
                . 'ON `103article`.`id_103typeofgame` = `103typeofgame`.`id` '
                . 'INNER JOIN `103department` '
                . 'ON `103article`.`id_103department` = `103department`.`id` '
                . 'INNER JOIN `103useraccount` '
                . 'ON `103article`.`id_103useraccount` = `103useraccount`.`id` '
                . 'LIMIT :limit OFFSET :offset';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':limit', $limit, PDO::PARAM_INT);
        $queryResult->bindValue(':offset', $offset, PDO::PARAM_INT);
        if ($queryResult->execute()) {
            if (is_object($queryResult)) {
                $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
            }
        }
        return $result;
    }

}

?>