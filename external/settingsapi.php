<?php
namespace OCA\Hubly\External;

use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Http\Request;
use \OCA\AppFramework\Http\JSONResponse;
use \OCA\AppFramework\Http\Http;

use \OCA\Hubly\Db\SettingMapper;
use \OCA\Hubly\Db\Setting;

use \OCA\Hubly\Db\AppMapper;

use \Exception;

class SettingsAPI extends Controller {

	public $settingMapper;
	public $appMapper;

	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
		$this->appMapper = new AppMapper($this->api);
		$this->settingMapper = new SettingMapper($this->api);
	}
	
	
	protected function authorizeAppRequest() {
		if ( !isset($this->request->app_id) ) throw new Exception("app_id must be set");
		if ( !isset($this->request->token)  )  throw new Exception("token must be set");
		if ( !isset($this->request->user_id)) throw new Exception("user_id must be set");
		return $this->appMapper->authenticateApp($this->request->app_id, $this->request->token, $this->request->user_id);
	}
	
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @IsLoggedInExemption
	 * @CSRFExemption
	 * @Ajax
	 * @API
	 */
	public function createSettings() {
		try {
			$this->app = $this->authorizeAppRequest();
			$appName = $this->app->getName();
			$deviceId = $this->app->getDeviceId();
			if ( !isset($this->request->data)) throw new Exception("data not set");
			$data = json_decode($this->request->data, true);
			if ( !$data ) throw new Exception("data must be a valid json object");
			foreach ($data as $key => $value) {
				$setting = new Setting(array("userId"=>$this->request->user_id, "appName"=>$appName, "deviceId"=>$deviceId, 																				"key"=>$key, "value"=>$value));
				$this->settingMapper->save($setting);
			}
			return new JSONResponse($data);
		} catch (Exception $exception) {
			return new JSONResponse($exception->getMessage());
		}
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
			$this->app = $this->authorizeAppRequest();
			$appName = $this->app->getName();
			$settings = $this->settingMapper->findByApp($appName, $this->request->user_id);
			foreach($settings as $setting) {
				$key = $setting->getKey();
				$data[$key] = $setting->getValue();
			}
			return new JSONResponse( array("userId"=>$settings[0]->getUserId(),	
															"appName"=>$settings[0]->getAppName(), "data"=>$data ));
		} catch (Exception $exception) {
			return new JSONResponse($exception->getMessage());
		}
			
	}
	
	
}
