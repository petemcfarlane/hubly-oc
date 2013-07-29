<?php
namespace OCA\Hubly\Db;

use \OCA\AppFramework\Db\Mapper;
use \OCA\AppFramework\Core\API;


class AppMapper extends Mapper {


    public function __construct(API $api) {
      parent::__construct($api, 'hubly_apps'); // tablename is hubly_apps
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
	
	public function findAllUserApps($userId, $limit=10) {
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `user_id` = ?';
        $apps = $this->findAllRows($sql, array($userId), $limit);
        return $apps;
	}
	
	
	public function authenticateApp($id, $token, $userId) {
		$sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `id` = ? AND `token` = ? AND `user_id` = ?';
        $row = $this->findOneQuery($sql, array($id, $token, $userId));
        $app = new App($row);
        return $app;
	}
	
	
	public function getAppName($id) {
		$sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `id` = ?';
        $row = $this->findOneQuery($sql, array($id));
        $app = new App($row);
        return $app->getName();	
	}
	
	public function save($app) {
		$sql = 'INSERT INTO '. $this->getTableName() . '(name, user, path) VALUES(?, ?, ?)';

		$params = array(
			$item->getName(),
			$item->getUser(),
			$item->getPath()
		);

		$this->execute($sql, $params);

		$item->setId($this->api->getInsertId());
		return $item;
	}

}
