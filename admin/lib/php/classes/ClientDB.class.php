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
    
    public function getClientById($id){
        try{
          $query= "select * from client where id_client=:id"  ;
          $resultset = $this->_db->prepare($query);
          $resultset->bindValue(':id',$id);
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
    
    public function addClient($data){
        try{
            $query = "insert into client (nom_client, prenom_client, telephone_client, mail_client, mdp_client, rue_client, numero_rue_client, code_postal_client, localite_client, pays_client) ";
            $query.="VALUES(:nom,:prenom,:tel,:mail,:mdp,:rue,:numero,:cp,:loc,:pays)";
        $resultset = $this->_db->prepare($query);
   
        $resultset->bindValue(':nom',$data['nom']);
        $resultset->bindValue(':prenom',$data['prenom']);
        $resultset->bindValue(':tel',$data['telephone']);
        $resultset->bindValue(':mail',$data['email']);
        $resultset->bindValue(':mdp',$data['password1']);
        $resultset->bindValue(':rue',$data['adresse']);
        $resultset->bindValue(':numero',$data['numero']);
        $resultset->bindValue(':cp',$data['codepostal']);
        $resultset->bindValue(':loc',$data['localite']);
        $resultset->bindValue(':pays',$data['pays']);
        $resultset->execute();
        return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function updateClient($data,$id){
        try{
            $query = "update client set nom_client=:nom, prenom_client=:prenom, telephone_client=:tel, mail_client=:mail, mdp_client=:mdp, rue_client=:rue, numero_rue_client=:numero, code_postal_client=:cp, localite_client=:loc, pays_client=:pays where id_client=:id";
             //$query = "update client set nom_client=:nom , prenom_client=:prenom where id_client=:id";
            $resultset = $this->_db->prepare($query);
         
             
        $resultset->bindValue(':nom',$data['nom']);
        $resultset->bindValue(':prenom',$data['prenom']);
        $resultset->bindValue(':tel',$data['telephone']);
        $resultset->bindValue(':mail',$data['email']);
        $resultset->bindValue(':mdp',$data['password1']);
        $resultset->bindValue(':rue',$data['adresse']);
        $resultset->bindValue(':numero',$data['numero']);
        $resultset->bindValue(':cp',$data['codepostal']);
        $resultset->bindValue(':loc',$data['localite']);
        $resultset->bindValue(':pays',$data['pays']);
        $resultset->bindValue(':id',$id);
        $resultset->execute();
        return 1;
        
             
        } catch (Exception $ex) {
            print $e->getMessage();
            return 0;
        }
        
    }

}
