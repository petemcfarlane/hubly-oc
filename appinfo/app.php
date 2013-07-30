<?php

namespace OCA\Hubly;

use \OCA\AppFramework\Core\API;

if (\OCP\App::isEnabled('appframework') ) {

	$api = new API('hubly');

	$api->addNavigationEntry(array(
		'id' => $api->getAppName(),
		'order' => 10,
//		'href' => $api->linkToRoute('hubly_index'),
		'href' => '/index.php',
		'icon' => $api->imagePath('hubly-logo-nav.svg'),
		'name' => $api->getTrans()->t('Hubly')
	));

} else {
	$msg = 'Can not enable Hubly because the App Framework App is disabled';
	\OCP\Util::writeLog('hubly', $msg, \OCP\Util::ERROR);
}