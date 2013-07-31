<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Entity;

class Setting extends Entity {
	
	public $userId;
	public $appName;
	public $deviceId; 
	public $key;
	public $value;


	public function __construct($fromRow=null){
		if ($fromRow) $this->fromRow($fromRow);
	}

}
