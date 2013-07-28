<?php
namespace OCA\Hubly\External;

use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Http\Request;
use \OCA\AppFramework\Http\JSONResponse;
use \OCA\AppFramework\Http\Http;

use \OCA\Hubly\Db\Setting;
use \OCA\Hubly\Db\SettingMapper;

use \OCA\Hubly\Db\AppMapper;



use \Exception;

class SettingsAPI extends Controller {
	//public $uid;
	//public $uname;
	//public $request;

	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
		//$userController = new UserController($api, $request);
		//$user = $userController->user;
		//if ($user->isLoggedIn()) {
		// 	$this->uid = $user->getUser();
		// 	$this->uname = $user->getDisplayName();
		//}
	}
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @IsLoggedInExemption
	 * @CSRFExemption
	 * @Ajax
	 * @API
	 */
	public function getSettings() {
		try {
			if ( !isset($_GET['app_id']) ) throw new Exception("app_id must be set");
			if ( !isset($_GET['token']) )  throw new Exception("token must be set");
			if ( !isset($_GET['user_id'])) throw new Exception("user_id must be set");
			$appMapper = new AppMapper($this->api);
			if ( !$appMapper->authenticateApp($_GET['app_id'], $_GET['token'], $_GET['user_id']) ) 
				throw new Exception("app_id/token/user_id don't match");
			$appName = $appMapper->getAppName($_GET['app_id']);
			$settingMapper = new SettingMapper($this->api);
			
			return new JSONResponse($settingMapper->findByApp($appName, $_GET['user_id']));

			return new OC_OCS_Result( self::getAppSettings($_GET['app_id'], $_GET['user_id'] ));
		} catch (Exception $exception) {
			return new JSONResponse($exception->getMessage());
			//return new OC_OCS_Result( null, 997, $exception->getMessage() );
		}
	}
	
}
