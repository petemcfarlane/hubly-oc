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
use \Exception;

class SettingController extends Controller {

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
	public function create() {
		try {
			$this->app = $this->authorizeAppRequest();
			$appName = $this->app->getName();
			$deviceId = $this->app->getDeviceId();
			if ( !isset($this->request->data)) throw new Exception("data not set");
			$data = json_decode($this->request->data, true);
			if ( !$data ) throw new Exception("data must be a valid json object");
			foreach ($data as $key => $value) {
				$setting = new Setting(array("userId"=>$this->request->user_id, "appName"=>$appName, "deviceId"=>$deviceId, 																				"key"=>$key, "value"=>$value));
				if ( $this->settingMapper->findByKey($setting) ) {
					$this->settingMapper->updateValue($setting);
				} else {
					$this->settingMapper->create($setting);
				}
			}
			return new JSONResponse( array( "userId"=>$setting->getUserId(), "appName"=>$setting->getAppName(), 
															"data"=>array( $setting->getKey() => $setting->getValue() ) ) );
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
	public function index() {
		try {
			$this->app = $this->authorizeAppRequest();
			$settings = $this->settingMapper->findByApp($this->app->getName(), $this->request->user_id);
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
			$this->app = $this->authorizeAppRequest();
			$setting = new Setting;
			$setting->setAppName($this->app->getName());
			$setting->setUserId($this->app->getUserId());
			$setting->setKey($this->request->settingId);
			$setting = $this->settingMapper->findByKey($setting);
			return new JSONResponse( array( "userId"=>$setting->getUserId(), "appName"=>$setting->getAppName(), 
																"data"=>array( $setting->getKey() => $setting->getValue() )	) );
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
			$this->app = $this->authorizeAppRequest();
			$setting = new Setting;
			$setting->setAppName($this->app->getName());
			$setting->setUserId($this->app->getUserId());
			$setting->setDeviceId($this->app->getDeviceId());
			$setting->setKey($this->request->settingId);
			$setting->setValue($this->request->value);
			$this->settingMapper->updateValue($setting);
			return new JSONResponse( array( "userId"=>$setting->getUserId(), "appName"=>$setting->getAppName(), 																	"data"=>array($setting->getKey() => $setting->getValue() ) ) );
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
			$this->app = $this->authorizeAppRequest();
			$setting = new Setting;
			$setting->setAppName($this->app->getName());
			$setting->setUserId($this->app->getUserId());
			$setting->setDeviceId($this->app->getDeviceId());
			$setting->setKey($this->request->settingId);
			$this->settingMapper->deleteByKey($setting);
			// $setting = $this->settingMapper->findByKey($setting);
			return new JSONResponse( array( "userId"=>$setting->getUserId(), "appName"=>$setting->getAppName(), 
															"data"=>array( $setting->getKey() => $setting->getValue() ) ) );
		} catch (Exception $exception) {	
			return new JSONResponse($exception->getMessage());
		}
	}
	
	
}
