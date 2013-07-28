<?php 

namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;
use \OCA\AppFramework\Http\TemplateResponse;

use \OCA\Hubly\Db\Setting;
use \OCA\Hubly\Db\SettingMapper;

use \OCA\Hubly\Db\App;
use \OCA\Hubly\Db\AppMapper;

use \OCA\Hubly\Db\Device;
use \OCA\Hubly\Db\DeviceMapper;

use \OCA\Hubly\Controller\UserController;

class PageController extends Controller {

	public $uid;
	public $uname;
	public $request;

	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
		$userController = new UserController($api, $request);
		$user = $userController->user;
		if ($user->isLoggedIn()) {
			$this->uid = $user->getUser();
			$this->uname = $user->getDisplayName();
		}
	}
	
		
	protected function redirect($url='hubly_index') {
		$response = new TemplateResponse($this->api, 'guest_index');
		$response->addHeader('Location', \OCP\Util::linkToRoute($url) );
		return $response;
	}

		
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function index() {
		if ( !$this->uid ) return $this->render('guest_index', array(), '');
		$params['uid'] = $this->uid;
		$params['uname'] = $this->uname;
		
		$settingMapper = new SettingMapper($this->api);
		$params['settings'] = $settingMapper->findAllUserSettings($this->uid);
		
		$appMapper = new AppMapper($this->api);
		$params['apps'] = $appMapper->findAllUserApps($this->uid);
		
		$deviceMapper = new DeviceMapper($this->api);
		$params['devices'] = $deviceMapper->findAllUserDevices($this->uid	);
		
		$params['response'] = isset($response) ? $response : NULL;
		$params['args'] = isset($args) ? $args : NULL;
		
		return $this->render('index', $params, '');
	}
	
		
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function loadPage() {
		if ( !$this->uid ) return $this->render($page, array(), '');
		$page = $this->request->page;
		$params['uid'] = $this->uid;
		$params['uname'] = $this->uname;
		return $this->render($page, $params, '');
	}
	

	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function login() {
		if ($this->uid) return $this->redirect('hubly_index');
		return $this->render('login', array(), '');
	}
	
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function signup() {
		if ($this->uid) return $this->redirect('hubly_index');
		$params['response'] = isset($response) ? $response : NULL;
		$params['args'] = isset($args) ? $args : NULL;
		return $this->render('signup', $params, ''); 
	}

	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function settings() {
		if ( !$this->uid ) return $this->redirect('hubly_signup');
		$params['uid'] = $this->uid;
		$params['uname'] = $this->uname;
		
		$settingMapper = new SettingMapper($this->api);
		$params['settings'] = $settingMapper->findAllUserSettings($this->uid);
		
		$params['response'] = isset($response) ? $response : NULL;
		$params['args'] = isset($args) ? $args : NULL;
		
		return $this->render('settings', $params, '');
	}

	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function devices() {
		if ( !$this->uid ) return $this->redirect('hubly_signup');
		$params['uid'] = $this->uid;
		$params['uname'] = $this->uname;
		
		$deviceMapper = new DeviceMapper($this->api);
		$params['devices'] = $deviceMapper->findAllUserDevices($this->uid);
		
		$params['response'] = isset($response) ? $response : NULL;
		$params['args'] = isset($args) ? $args : NULL;
		
		return $this->render('devices', $params, '');
	}

	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function apps() {
		if ( !$this->uid ) return $this->redirect('hubly_signup');
		$params['uid'] = $this->uid;
		$params['uname'] = $this->uname;
		
		$appMapper = new AppMapper($this->api);
		$params['apps'] = $appMapper->findAllUserApps($this->uid);
		
		$params['response'] = isset($response) ? $response : NULL;
		$params['args'] = isset($args) ? $args : NULL;
		
		return $this->render('apps', $params, '');
	}
}
