<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Entity;

class User extends Entity {

    // Note: a field id is set automatically by the parent class
	public $uid;
    public $displayname;
	public $password;

    public function __construct($uid, $displayname, $password) {
        // cast timestamp to an int when fromRow is being called
        // the second parameter is the argument that is passed to
        // the php function settype()
		$this->uid = $uid;
		$this->displayname = $displayname;
		$this->password = $password;
		$this->addType('timestamp', 'int');
    }


    // transform username to lower case
    public function setName($name){
        $name = strtolower($name);
        parent::setName($name);
    }

}