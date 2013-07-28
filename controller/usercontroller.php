<?php 
namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;

use \OCA\Hubly\Controller\PageController;
use \OCP\User;

use \Exception;

class UserController extends Controller {
	public $displayName;
	public $uid;
	public $uid_confirmation;
	public $password;

	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
		$this->user = new User;
	}
	
	
	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
	public function signup($groups=array('hubly'), $quota="100 MB"){
		try { // try to signup, if successfull, login and go to home page
			$this->displayName = $_POST['name'];
			$this->uid = $_POST['email'];
			$this->uid_confirmation = $_POST['email_confirmation'];
			$this->password = $_POST['password'];
			if (!$this->displayName) throw new Exception('Please provide a display name so we know what to call you', 1);	
			if (!$this->uid) throw new Exception('Email address must be provided, we promise not to spam you', 2);
			if (!$this->uid_confirmation) throw new Exception('Please re-enter your email to make sure you got it right', 3);
			if ($this->uid !== $this->uid_confirmation) throw new Exception('The Email addresses you entered didn\'t match', 4);
			if (strlen($this->password)<6) throw new Exception('Please choose a password of at least 6 characters', 5);
			
			$this->user->createUser($this->uid, $this->password);
			$this->user->setDisplayName($this->uid, $this->displayName);
			\OC_Preferences::setValue($this->uid, 'files', 'quota', $quota);
			foreach( $groups as $i ) {
				if(!\OC_Group::groupExists($i)) {
					\OC_Group::createGroup($i);
				}
				\OC_Group::addToGroup( $this->uid, $i );
			}
			$user->login($this->uid, $this->password);
			$location = \OCP\Util::linkToRoute("hubly_index");
			header( 'Location: '.$location );
		} catch (Exception $exception) {
			if ($exception->getMessage() == 'The username is already being used') {
				$params['response'] = array( 'status' => 'error', 'message' => "The email address has already been used", 'code' => 6 );
			} else {
				$params['response'] = array( 'status' => 'error', 'message' => $exception->getMessage(), 'code' => $exception->getCode() );
			}
			$params['args'] = array("name" => $this->displayName, "email" => $this->uid);
			return $this->render('signup', $params, '');
		}
	}
}