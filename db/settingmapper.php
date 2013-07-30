<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Mapper;
use \OCA\AppFramework\Core\API;


class SettingMapper extends Mapper {


    public function __construct(API $api) {
      parent::__construct($api, 'hubly_data'); // tablename is hubly_data
    }
	
	
	protected function findAllRows($sql, $params, $limit=null, $offset=null) {
		$result = $this->execute($sql, $params, $limit, $offset);
		$settings = array();
		while ( $row = $result->fetchRow() ) {
			$setting = new Setting();
			$setting->fromRow($row);
			array_push($settings, $setting);
		}
		return $settings;
	}

	// For Users (Browser)
	
	public function findAllUserSettings($userId, $limit=10) {
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `user_id` = ?';
        $settings = $this->findAllRows($sql, array($userId), $limit);
        return $settings;
	}
	
	
	// For Apps (API)
	
	public function create($setting) {
		$sql = 'INSERT INTO `' . $this->getTableName() . '` (`user_id`, `app_name`, `device_id`, `key`, `value`) VALUES (?,?,?,?,?)';
		$params = array( $setting->getUserId(), $setting->getAppName(), $setting->getDeviceId(), $setting->getKey(), 																												$setting->getValue() );
		$this->execute($sql, $params);
		$setting->setId($this->api->getInsertId($this->getTableName()));
		return $setting;
	}
	
    public function findByApp($appName, $userId){
		$sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `app_name` = ? AND `user_id` = ?';
		$settings = $this->findAllRows($sql, array($appName, $userId));
		return $settings;
    }
	
	public function findByKey($setting) {
		$sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `user_id` = ? AND `app_name` = ? AND `key` = ? ';
		$params = array( $setting->getUserId(), $setting->getAppName(), $setting->getKey() );
		$row = $this->findOneQuery($sql, $params);
		$setting = new Setting($row);
		return $setting;
	}
	
	public function updateValue($setting) {
		$sql = 'UPDATE `' . $this->getTableName() . '` SET `value` = ? WHERE `user_id` = ? AND `app_name` = ? AND `key` = ?';
		$params = array( $setting->getValue(), $setting->getUserId(), $setting->getAppName(), $setting->getKey() );
		$this->execute($sql, $params);
	}
	
	public function deleteByKey($setting) {
		$sql = 'DELETE FROM `' . $this->getTableName() . '` WHERE `user_id` = ? AND `app_name` = ? AND `key` = ?';
		$params = array( $setting->getUserId(), $setting->getAppName(), $setting->getKey() );
		$this->execute($sql, $params);
	}


}
