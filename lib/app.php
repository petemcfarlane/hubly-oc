<?php
Class OC_Hubly {

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