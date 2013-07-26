<?php 
namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;

class UserController extends Controller {
	private $user;
	
	public function __construct(API $api, Request $request, User $user) {
		parent::__construct($api, $request, $user;
	}
}


/*namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;
use \OCA\Hubly\Lib\App;
use \OCA\Hubly\Users\User;

class UserController extends Controller {
	private $user;

	public function __construct(API $api, Request $request, User $user){
		parent::__construct($api, $request);
		$this->user = $user;
	}


	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 * @IsLoggedInExemption
	 */
/*	public function signup() {
		\OCA\Hubly\Users\User\Test::test_print('does it work');
		
		/*try { // try to signup, if successfull, login & go to home page
			\OCA\Hubly\Lib\App\OC_Hubly::signup($_POST['email'], $_POST['email_confirmation'], $_POST['password'], $_POST['name'] );
		} catch (Exception $exception) { // else print error message
			if ($exception->getMessage() == 'The username is already being used') {
				$response = json_encode( array( 'status' => 'error', 'message' => "Th email address has already been used", 'code' => 6 ));
			} else {
				$response = json_encode( array( 'status' => 'error', 'message' => $exception->getMessage(), 'code' => $exception->getCode() ) );
			}
			$page = "signup";
			$args = array("name" => $_POST['name'], "email" => $_POST['email']);
			require __DIR__ . '/../index.php';	
		}*/
		
/*	}

}*/