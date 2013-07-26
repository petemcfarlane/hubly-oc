<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Entity;

class Item extends Entity {

    // Note: a field id is set automatically by the parent class
    public $name;
    public $path;
    public $user;
    public $timestamp;

    public function __construct() {
        // cast timestamp to an int when fromRow is being called
        // the second parameter is the argument that is passed to
        // the php function settype()
         $this->addType('timestamp', 'int');
    }


    // transform username to lower case
    public function setName($name){
        $name = strtolower($name);
        parent::setName($name);
    }

}