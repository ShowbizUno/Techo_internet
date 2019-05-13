<?php

class ClientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx de l'index
        $this->_db = $db;
    }

    public function getClient($login, $password) {
        try {
            $query = "select * from client where nom_client=:nom and mdp_client=:password";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $login);
            $resultset->bindValue(':password', $password);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Client($data);
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
    
    public function addClient(&nomc, &password){
        try{
            $query = "insert into client (nom_client,mdp_client)"."VALUES(:nom_client,:mdp_client)";
        } catch (Exception $ex) {

        }
    }

}
