<?php
Class OC_Hubly {

    /**
	 * @brief return an array of devices for a given user_id
	 * @param string $uid
	 * @return array
	 */
    public static function getDevices($uid){
        $query 	  = OC_DB::prepare('SELECT id, name FROM *PREFIX*hubly_devices WHERE user_id = ?');
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
}
?>