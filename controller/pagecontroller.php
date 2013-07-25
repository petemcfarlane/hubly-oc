<?php 

namespace OCA\Hubly\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;


class PageController extends Controller {


	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
	}


	/**
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 */
	public function index() {
		return $this->render('main');
	}


}