<?php
namespace OCA\Hubly\DependencyInjection;

use \OCA\AppFramework\DependencyInjection\DIContainer as BaseContainer;
use \OCA\AppFramework\Db\API;

use \OCA\Hubly\Controller\PageController;
use \OCA\Hubly\Controller\UserController;

use \OCA\Hubly\External\SettingsAPI;

use \OCA\Hubly\Db\SettingMapper;

	
class DIContainer extends BaseContainer {

    public function __construct(){
        parent::__construct('hubly');

        // use this to specify the template directory
        $this['TwigTemplateDirectory'] = __DIR__ . '/../templates';
		
	    // if you want to cache the template directory, add this path
	    //$this['TwigTemplateCacheDirectory'] = __DIR__ . '/../cache';

        $this['PageController'] = function($c){
            return new PageController($c['API'], $c['Request']);
		};
				
		$this['UserController'] = function($c){
			return new UserController($c['API'], $c['Request']);
		};

		$this['SettingsAPI'] = function($c){
			return new SettingsAPI($c['API'], $c['Request']);
		};
	}
}
