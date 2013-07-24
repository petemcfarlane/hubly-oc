<?php
OC::$CLASSPATH['OC_Hubly'] = 'apps/hubly/lib/app.php';
OC::$CLASSPATH['OC_Hubly_External'] = 'apps/hubly/lib/external.php';

OCP\App::addNavigationEntry( array( 
	'id' => 'hubly',
	'order' => 10,
	'href' => OCP\Util::linkToRoute('hubly_index'),
	'icon' => OCP\Util::imagePath('hubly', 'hubly-logo-nav.svg'),
	'name' => 'Hubly'
));