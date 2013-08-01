<?php 

namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;
use \OCA\AppFramework\Http\TemplateResponse;

use \OCA\Hubly\Db\Setting;
use \OCA\Hubly\Db\SettingMapper;
use \OCA\Hubly\Db\AppMapper;
use \OCA\Hubly\Db\DeviceMapper;

use \OCA\Hubly\Controller\UserController;

class PageController extends Controller {

	public $uid;
	public $uname;

	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
		$userController = new UserController($api, $request);
		$user = $userController->user;
		if ($user->isLoggedIn()) {
			$this->uid = $user->getUser();
			$this->params['uid'] = $user->getUser();
			$this->uname = $user->getDisplayName();
			$this->params['uname'] = $user->getDisplayName();
		}
		$this->settingMapper = new SettingMapper($this->api);
		$this->appMapper = new AppMapper($this->api);
		$this->deviceMapper = new DeviceMapper($this->api);
		$this->params['response'] = isset($response) ? $response : NULL;
		$this->params['args'] = isset($args) ? $args : NULL;

	}
	
		
	protected function redirect($url='hubly.page.index') {
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
		
		$this->params['settings'] = $this->settingMapper->findAllUserSettings($this->uid);
		$this->params['apps'] = $this->appMapper->findAllUserApps($this->uid);
		$this->params['devices'] = $this->deviceMapper->findAllUserDevices($this->uid	);
		
		return $this->render('index', $this->params, '');
	}
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function contact() {	return $this->render('contact', $this->params, ''); }
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function privacyPolicy() { return $this->render('privacy_policy', $this->params, ''); }
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function about() { return $this->render('about', $this->params, ''); }
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function help() { return $this->render('help', $this->params, ''); }
	

	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function login() {
		if ($this->uid) return $this->redirect('hubly.page.index');
		return $this->render('login', $this->params, '');
	}
	
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function signup() {
		if ($this->uid) return $this->redirect('hubly.page.index');
		return $this->render('signup', $this->params, ''); 
	}

	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function settings() {
		if ( !$this->uid ) return $this->redirect('hubly.page.signup');
		$this->params['settings'] = $this->settingMapper->findAllUserSettings($this->uid);
		return $this->render('settings', $this->params, '');
	}

	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function showSetting() {
		if ( !$this->uid ) return $this->redirect('hubly.page.signup');
		$setting = new Setting;
		$setting->setUserId($this->uid);
		$setting->setAppName($this->request->appName);
		$setting->setKey($this->request->key);
		$setting = $this->settingMapper->findByKey($setting);
		$this->params['settings'] = $setting;
		return $this->render('settings', $this->params, '');
	}

	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function devices() {
		if ( !$this->uid ) return $this->redirect('hubly.page.signup');
		$this->params['devices'] = $this->deviceMapper->findAllUserDevices($this->uid);
		return $this->render('devices', $this->params, '');
	}

	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function apps() {
		if ( !$this->uid ) return $this->redirect('hubly.page.signup');
		$this->params['apps'] = $this->appMapper->findAllUserApps($this->uid);
		return $this->render('apps', $this->params, '');
	}
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function account() {
		if ( !$this->uid ) return $this->redirect('hubly.page.signup');
		return $this->render('account', $this->params, '');
	}


}
