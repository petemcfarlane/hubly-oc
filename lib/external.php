<?php
Class OC_Hubly_External {

	/**
	 * returns a list of users
	 */
	public static function getSettings() {

		if ( isset($_POST['app_id']) && isset($_POST['token']) ) {
			// try to auth, if success proceed to list settings
			print 'SETTINGS';
		} elseif ( isset($_POST['user_id']) && isset($_POST['user_password']) && isset($_POST['app_name'])) {
			// try to auth user, if correct add new app.
			if ( OC_User::checkPassword($_POST['user_id'], $_POST['user_password']) ) {
				try{
					$return = self::addApp($_POST['app_name'], $_POST['user_id']);
					return new OC_OCS_Result( array( "status" =>"success", "app_id" => $return['app_id'], "token" => $return['token'] ) );	
					
				} catch (Exception $exception) {
					print $exception;
				}
			} else {  
				return new OC_OCS_Result( array( "status" =>"error", "message" => "user_id/password don't match" ) );				
			}
		}
		//return new OC_OCS_Result( $_POST );
		//$users = OC_User::getUsers();
		//return new OC_OCS_Result( $users );
	}
	
	
	/**
	 * attempts to add an app
	 * @param app_name
	 * @param user_id
	 * @param device_id
	 */
	private function addApp($app_name, $user_id, $device_id = null) {
		$token 	= uniqid('', true);
		$query 	= OC_DB::prepare('INSERT INTO `*PREFIX*hubly_apps` (user_id, name, token, device_id) VALUES (?, ?, ?, ?)');
		$result	= $query->execute( array( $user_id, $app_name, $token, $device_id ) );
    	$app_id = OC_DB::insertid();
		return array('app_id'=>$app_id, 'token'=>$token);
	}
}
?>