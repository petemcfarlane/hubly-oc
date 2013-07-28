<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Mapper;
use \OCA\AppFramework\Core\API;


class DeviceMapper extends Mapper {


    public function __construct(API $api) {
      parent::__construct($api, 'hubly_devices'); // tablename is hubly_devices
    }
	
	protected function findAllRows($sql, $params, $limit=null, $offset=null) {
		$result = $this->execute($sql, $params, $limit, $offset);

		$items = array();

		while($row = $result->fetchRow()){
			$item = new Item();
			$item->fromRow($row);

			array_push($items, $item);
		}

		return $items;
	}

	/*public function findAll($id) {
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

    public function findByApp($appId, $userId){
      $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `app_id` = ? AND `user_id` = ?';
      $row = $this->findAllRows($sql, array($appId, $userId));
      return $feed;
    }*/
	
	public function findAllUserDevices($userId, $limit=10) {
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `user_id` = ?';
        $devices = $this->findAllRows($sql, array($userId), $limit);
        return $devices;
	}

}
