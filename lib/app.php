<?php
namespace OCA\Hubly\Lib;

Class OC_Hubly {
	
	/**
	 * @brief Redirect to hubly home page
	 */
	public static function redirectToHubly() {
		$location = OCP\Util::linkToRoute('hubly_index');
		header("Location: ". $location);
	}
	
    /**
	 * @brief Try to create a new OC user
	 * @param string $username
	 * @param string $username_confirmation
	 * @param string $password
	 * @param string $displayName
	 * @param array $groups default = array('hubly')
	 * @param string $quota default = "100 MB"
	 * @return array
	 */
	public static function signup($username, $username_confirmation, $password, $displayName, $groups=array('hubly'), $quota="100 MB") {
		if (!$displayName) throw new Exception('Please provide a display name so we know what to call you', 1);	
		if (!$username) throw new Exception('Email address must be provided, we promise not to spam you', 2);
		if (!$username_confirmation) throw new Exception('Please re-enter your email to make sure you got it right', 3);
		if ($username !== $username_confirmation) throw new Exception('The Email addresses you entered didn\'t match', 4);
		if (strlen($password)<6) throw new Exception('Please choose a password of at least 6 characters', 5);
		OC_User::createUser($username, $password);
		OC_User::setDisplayName($username, $displayName);
		OC_Preferences::setValue($username, 'files', 'quota', $quota);
		foreach( $groups as $i ) {
			if(!OC_Group::groupExists($i)) {
				OC_Group::createGroup($i);
			}
			OC_Group::addToGroup( $username, $i );
		}
		OC_User::login($username, $password);
		$location = OCP\Util::linkToRoute("hubly_index");
		header( 'Location: '.$location );
	}

    /**
	 * @brief return an array of devices for a given user_id
	 * @param string $uid
	 * @return array
	 */
    public static function getDevices($uid){
        $query 	  = OC_DB::prepare('SELECT id, name FROM `*PREFIX*hubly_devices` WHERE user_id = ?');
    	$result	  = $query->execute( array( $uid ) );
    	return $result->fetchAll();
    }

    /**
	 * @brief return an array of apps for a given user_id
	 * @param string $uid
	 * @return array
	 */
    public static function getApps($uid){
        $query 	  = OC_DB::prepare('SELECT id, device_id, name FROM `*PREFIX*hubly_apps` WHERE user_id = ?');
    	$result	  = $query->execute( array( $uid ) );
    	return $result->fetchAll();
    }

    /**
	 * @brief return an array of settings/data for a given user_id
	 * @param string $uid
	 * @return array
	 */
    public static function getSettings($uid){
        $query 	  = OC_DB::prepare('SELECT id, device_id, app_id, data_key, data_value FROM `*PREFIX*hubly_data` WHERE user_id = ?');
    	$result	  = $query->execute( array( $uid ) );
    	return $result->fetchAll();
    }


    /**
     * @brief create a device
     * @param string $uid
     * @param string $name - device name
     * @param string $password - device password
	 * @return array
	 */
    public static function createDevice($uid, $name, $password){
        if (!$uid) throw new Exception("Problem with uid");
        if (!$name) throw new Exception("Problem with name");
        if (!$password) throw new Exception("Problem with password");
        $query 	  = OC_DB::prepare('INSERT INTO *PREFIX*hubly_devices (user_id, name, password) VALUES (?, ?, ?)');
    	$result	  = $query->execute( array( $uid, $name, $password ) );
    	$id = OC_DB::insertid();
        return $id;
    }
	
    /**
     * @brief create pagination
	 * @return string a html ul of pagination
	 */
    public static function paginate(){
		return '<ul class="pagination">
            <li class="arrow unavailable"><a href="">&laquo;</a></li>
            <li class="current"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li class="unavailable"><a href="">&hellip;</a></li>
            <li><a href="">12</a></li>
            <li><a href="">13</a></li>
            <li class="arrow"><a href="">&raquo;</a></li>
        </ul>';
    }
	

	
}
?>