<?php

class AdminDB extends Admin {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx de l'index
        $this->_db = $db;
    }

    public function getAdmin($login,$password) {
        try {
            $query = "select * from administration where pseudo_admin=:login and mdp_admin=:password";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login',$login);
            $resultset->bindValue(':password',$password);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Admin($data);
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }

}
