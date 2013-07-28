<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Entity;

class Device extends Entity {

    // Note: a field id is set automatically by the parent class
    public $userId;
    public $name;
    public $token;

    public function __construct(){
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
