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
		while($row = $result->fetchRow()){
			$setting = new Setting();
			$setting->fromRow($row);
			array_push($settings, $setting);
		}
		return $settings;
	}


	public function findAll($id) {
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `user_id` = ? ';
		$rows = $this->findAllRows($sql, array("foo@bar.com"));
		return $rows;
	}
	
    public function find($id, $userId){
      $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `id` = ? AND `user_id` = ?';
      // use findOneQuery to throw exceptions when no entry or more than one
      // entries were found
      $row = $this->findOneQuery($sql, array($id, $userId));
      $feed = new Item();
      $feed->fromRow($row);
      return $feed;
    }

    public function findByApp($appName, $userId){
      $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `app_name` = ? AND `user_id` = ?';
      $settings = $this->findAllRows($sql, array($appName, $userId));
      return $settings;
    }
	
	public function findAllUserSettings($userId, $limit=10) {
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `user_id` = ?';
        $settings = $this->findAllRows($sql, array($userId), $limit);
        return $settings;
	}
	
	public function save($setting) {
		$sql = 'INSERT INTO `' . $this->getTableName() . '` (`user_id`, `app_name`, `device_id`, `key`, `value`) VALUES (?,?,?,?,?)';
		$params = array(
			$setting->getUserId(),
			$setting->getAppName(),
			$setting->getDeviceId(),
			$setting->getKey(),
			$setting->getValue()
		);
		
		$this->execute($sql, $params);
		
		$setting->setId($this->api->getInsertId());
		return $setting;
	}
}
