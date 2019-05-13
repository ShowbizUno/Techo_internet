<?php
class Admin {

    private $_attributs = array();

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    //hydrate les données dans les setter
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
            //on affecte � la cl� sa valeur; le tableau $data est le resultset, tableau associatif
        }
    }

    //getters
    public function __get($key) {
        if (isset($this->_attributs[$key])) {
            return $this->_attributs[$key];
        }
    }

    //setters
    public function __set($key, $value) {
        $this->_attributs[$key] = $value;
    }

}
