<?php
namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Http\Request;
use \OCA\AppFramework\Http\JSONResponse;
use \OCA\AppFramework\Http\Http;
use \OCA\Hubly\Db\SettingMapper;
use \OCA\Hubly\Db\Setting;
use \OCA\Hubly\Db\AppMapper;
use \OCA\Hubly\Db\App;
use \Exception;

class SettingController extends Controller {

	public $settingMapper;
	public $appMapper;

	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
		$this->appMapper = new AppMapper($this->api);
		$this->settingMapper = new SettingMapper($this->api);
	}
	
	protected function authorizeAppRequest($appId, $token, $userId) {
		if ( !isset($appId)  ) throw new Exception("app_id must be set");
		if ( !isset($token)  ) throw new Exception("token must be set");
		if ( !isset($userId) ) throw new Exception("user_id must be set");
		$app = new App();
		$app->setUserId($userId);
		$app->setId($appId);
		$app->setToken($token);
		return $this->appMapper->authenticateApp($app);
	}
	
	protected function newSetting($app, $data) {
		$setting = new Setting();
		if ($app) {
			$setting->setAppName($app->getName());
			$setting->setUserId($app->getUserId());
			$setting->setDeviceId($app->getDeviceId());
		}
		if ($data) {
			$setting->setKey(key($data));
			$setting->setValue(current($data));
		}
		return $setting;
	}
	
	protected function returnSettings($app, $data) {
		return new JSONResponse( array( 
			"userId"=>$app->getUserId(), 
			"appName"=>$app->getName(), 
			"data"=>$data
		));
	}
	
	protected function checkData($data) {
		if ( !isset($data)) throw new Exception("data not set");
		$data = json_decode($data, true);
		if ( !$data ) throw new Exception("data must be a valid json object");
		return $data;
	}
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @IsLoggedInExemption
	 * @CSRFExemption
	 * @Ajax
	 * @API
	 */
	public function index() {
		try {
			$app = $this->authorizeAppRequest($this->request->app_id, $this->request->token, $this->request->user_id);
			$settings = $this->settingMapper->findByApp($app->getName(), $this->request->user_id);
			foreach($settings as $setting) {
				$key = $setting->getKey();
				$data[$key] = $setting->getValue();
			}
			return $this->returnSettings($app, $data);
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
	public function create() {
		try {
			$app = $this->authorizeAppRequest($this->request->app_id, $this->request->token, $this->request->user_id);
			$data = $this->checkData($this->request->data);
			foreach ($data as $key => $value) {
				$d = array();
				$d[$key] = $value;
				$setting = $this->newSetting($app, $d);
				$existingSettingId = $this->settingMapper->existingSetting($setting);
				if ( $existingSettingId ) {
					$setting->setId($existingSettingId);
					$this->settingMapper->update($setting);
				} else {
					$this->settingMapper->insert($setting);
				}
			}
			return $this->returnSettings($app, $data); 
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
	public function show() {
		try {
			$app = $this->authorizeAppRequest($this->request->app_id, $this->request->token, $this->request->user_id);
			$setting = $this->newSetting($app, null);
			$setting->setKey($this->request->key);
			$setting = $this->settingMapper->findByKey($setting);
			$data = array( $setting->getKey() => $setting->getValue() ) ;
			return $this->returnSettings($app, $data);
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
	public function update() {
		try {
			$app = $this->authorizeAppRequest($this->request->app_id, $this->request->token, $this->request->user_id);
			if ( !isset($this->request->value) ) throw new Exception("value must be set");
			$setting = $this->newSetting($app, null);
			$setting->setKey($this->request->key);
			$setting = $this->settingMapper->findByKey($setting);
			$setting->setValue($this->request->value);
			$this->settingMapper->update($setting);
			$data = array($setting->getKey() => $setting->getValue() );
			return $this->returnSettings($app, $data); 
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
	public function destroy() {
		try {
			$app = $this->authorizeAppRequest($this->request->app_id, $this->request->token, $this->request->user_id);
			$setting = $this->newSetting($app);
			$setting->setKey($this->request->key);
			$setting = $this->settingMapper->findByKey($setting);
			$this->settingMapper->delete($setting);
			$data = array($setting->getKey() => $setting->getValue() );
			return $this->returnSettings($app, $data); 
		} catch (Exception $exception) {	
			return new JSONResponse($exception->getMessage());
		}
	}
	
	
}
