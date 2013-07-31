<?php 
namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;
use \OCA\AppFramework\Http\JSONResponse;
use \OCA\AppFramework\Http\TemplateResponse;
use \OCP\User;
use \Exception;

class UserController extends Controller {
	public $displayName;
	public $uid;
	public $uid_confirmation;
	public $password;

	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
		$this->user = new User; // used by pagecontroller
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
	public function login() {
		try {
			if ( empty($this->request->email) )    throw new Exception('Email address must be provided', 1);
			if ( empty($this->request->password) ) throw new Exception('Password must be provided', 2);	
			if ( !\OC_User::login($this->request->email, $this->request->password) ) 
						                           throw new Exception('Email address or password incorrect. Please try again', 2);
			return $this->redirect();
		} catch(Exception $exception) {
			$params['response'] = array( 'status'=>'error', 'message'=>$exception->getMessage(), 'code'=>$exception->getCode() );
			$params['args'] = array("email" => $this->request->email);
			return $this->render('login', $params, '');
		}
	}
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function logout() {
		$this->user->logout();
		return $this->redirect();
	}
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function signup($groups=array('hubly'), $quota="100 MB") {
		try {
			if ( empty($this->request->name) ) throw new Exception('Please provide a display name so we know what to call you', 1);	
			if ( empty($this->request->email)) throw new Exception('Email address must be provided, we promise not to spam you', 2);
			if ( empty($this->request->email_confirmation) ) 
												throw new Exception('Please re-enter your email to make sure you got it right', 3);
			if ( $this->request->email !== $this->request->email_confirmation ) 
												throw new Exception('The Email addresses you entered didn\'t match', 4);
			if ( strlen($this->request->password) < 6 ) throw new Exception('Please choose a password of at least 6 characters', 5);
			if ( !\OC_User::createUser($this->request->email, $this->request->password) ) 
																			throw new Exception('User creation failed');
			\OC_User::setDisplayName($this->request->email, $this->request->name);
			foreach( $groups as $group ) {
				if(!\OC_Group::groupExists($group)) {
					\OC_Group::createGroup($group);
				}
				\OC_Group::addToGroup( $this->request->email, $group );
			}
			if ( !\OC_User::login($this->request->email, $this->request->password) ) throw new Exception('Login failed');
			return $this->redirect('hubly.page.index');
		} catch (Exception $exception) {
			if ($exception->getMessage() == 'The username is already being used') {
				$params['response'] = array( 'status'=>'error', 'message'=>"The email address has already been used", 'code'=>6 );
			} else {
				$params['response'] = array( 'status'=>'error', 'message'=>$exception->getMessage(), 'code'=>$exception->getCode() );
			}
			$params['args'] = array("name" => $this->request->name, "email" => $this->request->email);
			return $this->render('signup', $params, '');
		}
	}		
}