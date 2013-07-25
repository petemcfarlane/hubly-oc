<?php
Class OC_Hubly_External {

	/**
	 * @brief returns index of settings for authorized app
	 * @return OC_OCS_Result with data, code, message
	 */
	public static function getSettings() {
		try {

			if ( !isset($_GET['app_id']) ) throw new Exception("app_id must be set");
			if ( !isset($_GET['token']) )  throw new Exception("token must be set");
			if ( !isset($_GET['user_id'])) throw new Exception("user_id must be set");
			if ( !self::authenticateApp($_GET['app_id'], $_GET['token'], $_GET['user_id']) ) 
				throw new Exception("app_id/token/user_id don't match");

			return new OC_OCS_Result( self::getAppSettings($_GET['app_id'], $_GET['user_id'] ));
		} catch (Exception $exception) {
			return new OC_OCS_Result( null, 997, $exception->getMessage() );
		}
	}
	
	
	/**
	 * @brief save settings in key=value pairs
	 */
	public static function createSettings() {
		try {
			
			if ( !isset($_POST['app_id']) ) throw new Exception("app_id must be set");
			if ( !isset($_POST['token']) )  throw new Exception("token must be set");
			if ( !isset($_POST['user_id'])) throw new Exception("user_id must be set");
			if ( !self::authenticateApp($_POST['app_id'], $_POST['token'], $_POST['user_id']) ) 
				throw new Exception("app_id/token/user_id don't match");
			print_r(json_decode($_POST['data']));
			
		} catch (Exception $exception) {
			return new OC_OCS_Result( null, 997, $exception->getMessage() );
		}
	}



	/**
	 * @brief adds an app if user auth successfull
	 * @return OC_OCS_Result with data(app_id, token), code, message
	 */
	public static function authApp() {
		try {

			if ( !isset($_POST['user_id']) )	   throw new Exception("user_id must be set");
			if ( !isset($_POST['user_password']) ) throw new Exception("user_password must be set");
			if ( !isset($_POST['app_name']) ) 	   throw new Exception("app_name must be set");
			if ( isset($_POST['device_id'])) {$device_id=$_POST['device_id'];} else {$device_id = 0;}
			if ( !OC_User::checkPassword($_POST['user_id'], $_POST['user_password']) ) 
				throw new Exception("user_id/password don't match");

			$token = self::getToken($_POST['user_id'], $_POST['app_name'], $device_id);
			if ( $token ) {
				return new OC_OCS_Result( $token );
			} else {
				return new OC_OCS_Result( self::addApp($_POST['app_name'], $_POST['user_id'], $device_id ) );
			}

		} catch (Exception $exception) {
			return new OC_OCS_Result( null, 997, $exception->getMessage() );
		}
	}
	
	
	/**
	 * @brief attempts to get an app token, if exists or returns false
	 * @param string $user_id
	 * @param string $app_name
	 * @param integer $device_id, default=0
	 * @return array(app_id, token) or false
	 */
	private static function getToken($user_id, $app_name, $device_id=0) {
		$query  = OC_DB::prepare('SELECT id, token FROM `*PREFIX*hubly_apps` WHERE user_id = ? AND name = ? AND device_id = ?');
		$result = $query->execute( array( $user_id, $app_name, $device_id ) );
		$result = $result->fetchRow();
		return $result ? $result : false;
	}
	
	
	/**
	 * @brief add an app
	 * @param app_name
	 * @param user_id
	 * @param device_id
	 * @return array(app_id, token)
	 */
	private static function addApp($app_name, $user_id, $device_id=0) {
		$token 	= uniqid('', true);
		$query 	= OC_DB::prepare('INSERT INTO `*PREFIX*hubly_apps` (user_id, name, token, device_id) VALUES (?, ?, ?, ?)');
		$result	= $query->execute( array( $user_id, $app_name, $token, $device_id ) );
    	$app_id = OC_DB::insertid();
		return array('app_id'=>$app_id, 'token'=>$token);
	}
	

	/**
	 * @brief authenticate app
	 * @param string $app_id
	 * @param string $token
	 * @return boolean
	 */
	private static function authenticateApp($app_id, $token, $user_id) {
		$query  = OC_DB::prepare('SELECT id FROM `*PREFIX*hubly_apps` WHERE `id` = ? AND `token` = ? AND `user_id` = ? ');
		$result = $query->execute( array( $app_id, $token, $user_id ));
		$result = $result->fetchRow();
		return $result;
	}


    /**
	 * @brief return an array of settings/data for a given app_name & user_id
	 * @param string $app_name
	 * @param string $user_id
	 * @return array
	 */
    public static function getAppSettings($app_name, $user_id){
		$query 	  = OC_DB::prepare('SELECT data_key, data_value FROM `*PREFIX*hubly_data` WHERE app_name = ? AND user_id = ?');
		$result	  = $query->execute( array( $app_name, $user_id ) );
		return $result->fetchAll();
    }
}
?>