<?php

namespace Models;

class Conta {

    private $id;
    private $owner;
    private $limit;

    function __construct($id, $owner, $limit)
    {
        $this->setId($id);
        $this->setOwner($owner);
        $this->setLimit($limit);
    }
    
    private function setId ($id) {
        $this->id = $id;
    }

    private function setLimit ($limit) {
        $this->limit = $limit;
    }
    private function setOwner ($owner) {
        $this->owner = $owner;
    }
    
    public function getId () {
        return $this->id;
    }

    public function getOwner () {
        return $this->owner;
    }

    public function getLimit () {
        return $this->limit;
    }


}