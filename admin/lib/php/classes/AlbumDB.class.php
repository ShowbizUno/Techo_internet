<?php

class AlbumDB extends Album {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx de l'index
        $this->_db = $db;
    }

    public function getAllAlbum() {
        try {
            $query = "select * from albums";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = $data;
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

    public function getAlbumByArtiste($id_artiste) {
        try {
            $this->_db->beginTransaction();
            $query = "select * from albums where id_artiste=:id_artiste";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_artiste', $id_artiste);
            $resultset->execute();
            $this->_db->commit();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
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