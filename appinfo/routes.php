<?php 

namespace OCA\Hubly;

use \OCA\AppFramework\Routing\RouteConfig;
use \OCA\Hubly\DependencyInjection\DIContainer;

// first argument is the router, second is the path to the config file
$routeConfig = new RouteConfig(new DIContainer(), $this, __DIR__ . '/routes.yml');
$routeConfig->register();

/*
namespace OCA\Hubly;

use \OCA\AppFramework\App;

use \OCA\Hubly\DependencyInjection\DIContainer;

$this->create('hubly_index', '/')->get()->action(function($params){
	App::main('PageController', 'index', $params, new DIContainer());
});

$this->create('hubly_signup_form', '/signup')->get()->action(function($params) {
	App::main('PageController', 'signup', $params, new DIContainer());
});

$this->create('hubly.page.signup', '/signup')->post()->action(function($params){
	App::main('UserController', 'signup', $params, new DIContainer());
});

$this->create('hubly_login', '/login')->get()->action(function($params){
	App::main('PageController', 'login', $params, new DIContainer());
});

$this->create('hubly_about', '/about')->get()->action(function($params){
	App::main('PageController', 'loadPage', array('page'=>'about'), new DIContainer());
});

$this->create('hubly_help', '/help')->get()->action(function($params){
	App::main('PageController', 'loadPage', array('page'=>'help'), new DIContainer());
});

$this->create('hubly_contact', '/contact')->get()->action(function($params){
	App::main('PageController', 'loadPage', array('page'=>'contact'), new DIContainer());
});

$this->create('hubly_privacy_policy', '/privacy-policy')->get()->action(function($params){
	App::main('PageController', 'loadPage', array('page'=>'privacy-policy'), new DIContainer());
});

$this->create('hubly_devices', '/devices')->get()->action(function($params){
	App::main('PageController', 'devices', array('var'=>123), new DIContainer());
});

$this->create('hubly_apps', '/apps')->get()->action(function($params){
	App::main('PageController', 'apps', $params, new DIContainer());
});

$this->create('hubly_settings', '/settings')->get()->action(function($params){
	App::main('PageController', 'settings', $params, new DIContainer());
});

$this->create('hubly_settings_key', '/settings/{appName}/{key}')->get()->action(function($params) {
	App::main('PageController', 'showSetting', $params, new DIContainer());
});


// External Methods /api/


$this->create('hubly_api_settings_create', '/api/settings')->post()->action(function($params){
	App::main('SettingsAPI', 'createSettings', $params, new DIContainer());
});

$this->create('hubly_api_settings_index', '/api/settings')->get()->action(function($params){
	App::main('SettingsAPI', 'indexSettings', $params, new DIContainer());
});

$this->create('hubly_api_settings_show', '/api/settings/{key}')->get()->action(function($params){
	App::main('SettingsAPI', 'showSetting', $params, new DIContainer());
});

$this->create('hubly_api_settings_update', '/api/settings/{key}')->post()->action(function($params){
	App::main('SettingsAPI', 'updateSetting', $params, new DIContainer());
});

$this->create('hubly_api_settings_delete', '/api/settings/{key}/delete')->post()->action(function($params) {
	App::main('SettingsAPI', 'deleteSetting', $params, new DIContainer());
});

/*OCP\API::register('GET', '/apps/hubly/settings', array('OC_Hubly_External', 'getSettings'), 'hubly', OC_API::GUEST_AUTH);
OCP\API::register('POST', '/apps/hubly/settings', array('OC_Hubly_External', 'createSettings'), 'hubly', OC_API::GUEST_AUTH);
OCP\API::register('POST', '/apps/hubly/auth', array('OC_Hubly_External', 'authApp'), 'hubly', OC_API::GUEST_AUTH);
*/ 