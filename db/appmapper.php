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
		$apps = array();
		while($row = $result->fetchRow()){
			$app = new App($row);
			array_push($apps, $app);
		}
		return $apps;
	}

	public function findAllUserApps($userId, $limit=10) {
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `user_id` = ?';
        $apps = $this->findAllRows($sql, array($userId), $limit);
        return $apps;
	}

	public function authenticateApp($app) {
		$sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `id` = ? AND `token` = ? AND `user_id` = ?';
		$params = array( $app->getId(), $app->getToken(), $app->getUserId() );
        $row = $this->findOneQuery($sql, $params);
        $app = new App($row);
        return $app;
	}

	public function getAppName($id) {
		$sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `id` = ?';
        $row = $this->findOneQuery($sql, array($id));
        $app = new App($row);
        return $app->getName();	
	}

	public function appExists($app) {
		$sql = 'SELECT id FROM `'. $this->getTableName() . '` WHERE `name` = ? AND `device_id` = ? AND `user_id` = ? ';
		$params = array($app->getName(), $app->getDeviceId(), $app->getUserId() );
		$result = $this->execute($sql, $params);
		$result = $result->fetchRow();
		if ($result) return $result['id'];
	}

}
