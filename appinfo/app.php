<?php
OC::$CLASSPATH['OC_Hubly'] = 'apps/hubly/lib/app.php';

OCP\App::addNavigationEntry( array( 
	'id' => 'hubly',
	'order' => 10,
	'href' => OCP\Util::linkToRoute('root_path'),
	'icon' => OCP\Util::imagePath('hubly', 'hubly.svg'),
	'name' => 'Hubly'
));