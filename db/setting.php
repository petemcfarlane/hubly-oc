<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Entity;

class Setting extends Entity {
	
	public $userId;
	public $appName;
	protected $deviceId; // don't include in api response
	public $key;
	public $value;


	public function __construct($fromRow=null){
		if ($fromRow) $this->fromRow($fromRow);
	}

	public function getId() {
		return $this->id;
	}

	public function getUserId() {
		return $this->userId;
	}
		
	public function getAppName() {
		return $this->appName;
	}
	
	public function getDeviceId() {
		return $this->deviceId;
	}

	public function getKey() {
		return $this->key;
	}

	public function getValue() {
		return $this->value;
	}



	public function setId($id) {
		$this->id = $id;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}
		
	public function setAppName($appName) {
		$this->appName = $appName;
	}
	
	public function setDeviceId($deviceId) {
		$this->deviceId = $deviceId;
	}

	public function setKey($key) {
		$this->key = $key;
	}

	public function setValue($value) {
		$this->value = $value;
	}


}
