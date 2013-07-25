<?php
/*OC::$CLASSPATH['OC_Hubly'] = 'apps/hubly/lib/app.php';
OC::$CLASSPATH['OC_Hubly_External'] = 'apps/hubly/lib/external.php';

OCP\App::addNavigationEntry( array( 
	'id' => 'hubly',
	'order' => 10,
	'href' => OCP\Util::linkToRoute('hubly_index'),
	'icon' => OCP\Util::imagePath('hubly', 'hubly-logo-nav.svg'),
	'name' => 'Hubly'
));
*/
namespace OCA\Hubly;

use \OCA\AppFramework\Core\API;

if(\OCP\App::isEnabled('appframework')){

	$api = new API('hubly');

	$api->addNavigationEntry(array(

		// the string under which your app will be referenced in owncloud
		'id' => $api->getAppName(),

		// sorting weight for the navigation. The higher the number, the higher
		// will it be listed in the navigation
		'order' => 10,

		// the route that will be shown on startup
		'href' => $api->linkToRoute('hubly_index'),

		// the icon that will be shown in the navigation
		// this file needs to exist in img/example.png
		'icon' => $api->imagePath('hubly-logo-nav.svg'),

		// the title of your application. This will be used in the
		// navigation or on the settings page of your app
		'name' => $api->getTrans()->t('Hubly')

	));

	//$api->addRegularTask('OCA\News\Backgroundjob\Task', 'run');

} else {
	$msg = 'Can not enable the News app because the App Framework App is disabled';
	\OCP\Util::writeLog('news', $msg, \OCP\Util::ERROR);
}