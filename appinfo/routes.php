<?php 
namespace OCA\Hubly;

use \OCA\AppFramework\App;

use \OCA\Hubly\DependencyInjection\DIContainer;

$this->create('hubly_index', '/')->get()->action(function($params){
	App::main('PageController', 'index', $params, new DIContainer());
});

$this->create('hubly_signup_form', '/signup')->get()->action(function($params) {
	App::main('PageController', 'signup', $params, new DIContainer());
});

$this->create('hubly_signup', '/signup')->post()->action(function($params){
	App::main('UserController', 'signup', $params, new DIContainer());
});


$this->create('hubly_login', '/login')->get()->action(function($params){
	App::main('PageController', 'login', $params, new DIContainer());
});

$this->create('hubly_about', '/about')->get()->action(function($params){
	App::main('PageController', 'about', $params, new DIContainer());
});

$this->create('hubly_help', '/help')->get()->action(function($params){
	App::main('PageController', 'help', $params, new DIContainer());
});

$this->create('hubly_contact', '/contact')->get()->action(function($params){
	App::main('PageController', 'contact', $params, new DIContainer());
});

$this->create('hubly_privacy_policy', '/privacy-policy')->get()->action(function($params){
	App::main('PageController', 'privacy_policy', $params, new DIContainer());
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


// External Methods /ocs/v1.php/

/*OCP\API::register('GET', '/apps/hubly/settings', array('OC_Hubly_External', 'getSettings'), 'hubly', OC_API::GUEST_AUTH);
OCP\API::register('POST', '/apps/hubly/settings', array('OC_Hubly_External', 'createSettings'), 'hubly', OC_API::GUEST_AUTH);
OCP\API::register('POST', '/apps/hubly/auth', array('OC_Hubly_External', 'authApp'), 'hubly', OC_API::GUEST_AUTH);
*/