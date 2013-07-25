<?php 

namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;
use \OCA\Hubly\Lib\App;

class PageController extends Controller {


	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
	}


	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function index() {
		if (\OC_User::isLoggedIn()) {
		//	if ($page == 'signup' || $page == 'login') OC_Hubly::redirectToHubly(); 
		//    $page = isset($page) ? $page : 'index';
			$params['uid'] = \OC_User::getUser();
			$params['uname'] = \OC_User::getDisplayName($params['uid']);
			$params['settings'] = 'GET SETTINGS';
			$params['apps'] = 'GET APPS';
			$params['devices'] = 'GET DEVICES';
			$params['response'] = isset($response) ? $response : NULL;
			$params['args'] = isset($args) ? $args : NULL;
			
			return $this->render('index', $params, '');
		} else {
			return $this->render('guest_index', array(), '');
		}
		
	}
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function signup() {
		$response = array("code"=>7, "message"=>"error", "status"=>"success");
		$args = array("name"=>"testname", "email"=>"email@test.com");
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
	public function about() {
		return $this->render('about', array(), '');
	}
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function contact() {
		return $this->render('contact', array(), '');
	}


	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function login() {
		return $this->render('login', array(), '');
	}
	
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function privacy_policy() {
		return $this->render('privacy-policy', array(), '');
	}
	
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function help() {
		return $this->render('help', array(), '');
	}
	
	


}