<?php 
$this->create('root_path', '/')->get()->action(function($params){
	require __DIR__ . '/../index.php';
});

$this->create('signup_path', '/signup')->post()->action(function($params){
	// try to signup, if successfull, login & go to home page
	$groups =  isset($_POST["groups"]) ? $_POST["groups"] : array();
	$username = $_POST["email"];
	$username_confirmation = $_POST['email_confirmation'];
	$password = $_POST["password"];
	$displayName = $_POST['name'];
	$quota = "100 MB";

	try {
		if ($username !== $username_confirmation) throw new Exception('Email addresses must match');
		OC_User::createUser($username, $password);
		OC_User::setDisplayName($username, $displayName);
		OC_Preferences::setValue($username, 'files', 'quota', $quota);
		foreach( $groups as $i ) {
			if(!OC_Group::groupExists($i)) {
				OC_Group::createGroup($i);
			}
			OC_Group::addToGroup( $username, $i );
		}
		OC_User::login($username, $password);
		$location = OCP\Util::linkToRoute("root_path");
		header( 'Location: '.$location );
		exit();
	} catch (Exception $exception) {
		print_r( $exception->getMessage() );
	}
});

$this->create('login_path', '/login')->get()->action(function($params){
	$page = "login";
	require __DIR__ . '/../index.php';
});


$this->create('about_path', '/about')->get()->action(function($params){
	$page = "about";
	require __DIR__ . '/../index.php';
});

$this->create('help_path', '/help')->get()->action(function($params){
	$page = "help";
	require __DIR__ . '/../index.php';
});

$this->create('contact_path', '/contact')->get()->action(function($params){
	$page = "contact";
	require __DIR__ . '/../index.php';
});

$this->create('privacyPolicy_path', '/privacy-policy')->get()->action(function($params){
	$page = "privacy-policy";
	require __DIR__ . '/../index.php';
});


// External Methods

\OCP\API::register(
    'get',
    '/apps/hubly/external',
    function($urlParameters) {
      return new \OC_OCS_Result(array("hello"));
    },
    'hubly',
    OC_API::ADMIN_AUTH
);
