<?php
namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Http\Request;
use \OCA\AppFramework\Http\JSONResponse;
use \OCA\AppFramework\Http\Http;
use \OCA\Hubly\Db\AppMapper;
use \OCA\Hubly\Db\App;
use \OCP\User;
use \Exception;

class AppController extends controller {
	
	public $appMapper;

	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
		$this->appMapper = new AppMapper($this->api);
	}
	
	protected function returnApp($app) {
		return new JSONResponse( array(
			"app_id" => $app->getId(),
			"name"   => $app->getName(),
			"token"  => $app->getToken(),
			"user_id"=> $app->getUserId()
		 ));
	}
	
	protected function authenticateApp($userId, $appId, $token) {
		if ( !$userId ) throw new Exception("user_id must be set");
		if ( !$appId )  throw new Exception("app_id must be set");
		if ( !$token )   throw new Exception("token must be set");
		$app = new App();
		$app->setUserId($userId);
		$app->setId($appId);
		$app->setToken($token);
		return $this->appMapper->authenticateApp($app);
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
			return new JSONResponse( "index" );
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
			if ( !$this->request->user_id ) throw new Exception("user_id must be set");
			if ( !$this->request->app_name ) throw new Exception("app_name must be set");
			if ( !$this->request->password ) throw new Exception("password must be set");
			if ( !User::checkPassword($this->request->user_id, $this->request->password) ) 
											throw new Exception("user_id/password invalid");
			$app = new App;
			$app->setUserId($this->request->user_id);
			$app->setName($this->request->app_name);
			$app->setDeviceId(0);
			$app->setToken(null);
			$existingAppId = $this->appMapper->appExists($app);
			if ( $existingAppId ) {
				$app->setId( $existingAppId );
				$this->appMapper->update($app);
			} else {
				$this->appMapper->insert($app);
			}
			return $this->returnApp($app);
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
			$app = $this->authenticateApp($this->request->user_id, $this->request->appId, $this->request->token);
			return $this->returnApp($app);
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
			if ( !$this->request->app_name ) throw new Exception("app_name must be set");
			$app = $this->authenticateApp($this->request->user_id, $this->request->appId, $this->request->token);
			$app->setName($this->request->app_name);
			$app->setToken(null);
			$this->appMapper->update($app);
			return $this->returnApp($app);
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
			$app = $this->authenticateApp($this->request->user_id, $this->request->appId, $this->request->token);
			$this->appMapper->delete($app);
			return $this->returnApp($app);
		} catch (Exception $exception) {
			return new JSONResponse($exception->getMessage());
		}
	}
}