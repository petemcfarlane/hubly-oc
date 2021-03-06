<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Entity;

class App extends Entity {

	public $userId;
	public $deviceId;
	public $name;
	public $token;

	public function __construct($fromRow=null){
		if ($fromRow) $this->fromRow($fromRow);
	}

	public function setToken($token) {
		$token = isset($token) ? $token : uniqid('', true);
		parent::setToken($token);
	}	
}
