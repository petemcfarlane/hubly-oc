<?php
OCP\JSON::checkAppEnabled('hubly');
OCP\App::setActiveNavigationEntry( 'hubly' );

if (OCP\User::isLoggedIn()) {
    $page = isset($page) ? $page : 'index';
	$uid = OCP\User::getUser();
	$uname = OCP\User::getDisplayName($uid);
} else {
    $page = isset($page) ? $page : 'guest_index';
	$uid = NULL;
	$uname = NULL;
}
//OCP\User::checkLoggedIn();

//OCP\Util::addScript('projects','projects');
//OCP\Util::addScript('3rdparty','jquery.pjax.min');
//OCP\Util::addStyle('hubly', 'hubly');


//$project_id = ( isset($params['project_id']) && is_numeric($params['project_id']) ) ? $params['project_id'] : NULL; 
//$view 		= isset($params['view']) ? $params['view'] : ( isset($project_id) ? 'project' : NULL );
//$item		= isset($params['item']) ? $params['item'] : NULL;
//$uid		= OC_User::getUser();
//$renderas 	= ( isset($_SERVER['HTTP_X_PJAX']) ) ? '' : 'user';
$renderas = '';

$tmpl = new OCP\Template( 'hubly', $page, $renderas );
//$tmpl->assign( 'project_id', $project_id );
//$tmpl->assign( 'view', 		 $view );
//$tmpl->assign( 'item', 	 	 $item );
$tmpl->assign('page', $page);
$tmpl->assign('uname', $uname);
$tmpl->assign('uid', $uid );
$tmpl->printPage();