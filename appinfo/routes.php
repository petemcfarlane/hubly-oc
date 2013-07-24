<?php 
$this->create('hubly_index', '/')->get()->action(function($params){
	require __DIR__ . '/../index.php';
});

$this->create('hubly_signup_form', '/signup')->get()->action(function($params) {
	$page = "signup";
	require __DIR__ . '/../index.php';	
});

$this->create('hubly_signup', '/signup')->post()->action(function($params){
	try { 	// try to signup, if successfull, login & go to home page
		OC_Hubly::signup($_POST['email'], $_POST['email_confirmation'], $_POST['password'], $_POST['name'] );
	} catch (Exception $exception) { // else print error message
		if ($exception->getMessage() == 'The username is already being used') {
			$response = json_encode( array( 'status' => 'error', 'message' => "Th email address has already been used", 'code' => 6 ));
		} else {
			$response = json_encode( array( 'status' => 'error', 'message' => $exception->getMessage(), 'code' => $exception->getCode() ) );
		}
		$page = "signup";
		$args = array("name" => $_POST['name'], "email" => $_POST['email']);
		require __DIR__ . '/../index.php';	
	}
});


$this->create('hubly_login', '/login')->get()->action(function($params){
	$page = "login";
	require __DIR__ . '/../index.php';
});

$this->create('hubly_about', '/about')->get()->action(function($params){
	$page = "about";
	require __DIR__ . '/../index.php';
});

$this->create('hubly_help', '/help')->get()->action(function($params){
	$page = "help";
	require __DIR__ . '/../index.php';
});

$this->create('hubly_contact', '/contact')->get()->action(function($params){
	$page = "contact";
	require __DIR__ . '/../index.php';
});

$this->create('hubly_privacy_policy', '/privacy-policy')->get()->action(function($params){
	$page = "privacy-policy";
	require __DIR__ . '/../index.php';
});

$this->create('hubly_devices', '/devices')->get()->action(function($params){
    $page = "devices";
	require __DIR__ . '/../index.php';
});

$this->create('hubly_apps', '/apps')->get()->action(function($params){
	$page = "apps";
	require __DIR__ . '/../index.php';
});

$this->create('hubly_settings', '/settings')->get()->action(function($params){
	$page = "settings";
	require __DIR__ . '/../index.php';
});


// External Methods

OCP\API::register('post', '/apps/hubly/settings', array('OC_Hubly_External', 'getSettings'), 'hubly', OC_API::GUEST_AUTH);
