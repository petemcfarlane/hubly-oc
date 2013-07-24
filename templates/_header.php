<?php $args = isset($_['args']) ? $_['args'] : NULL; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php p(isset($title)? $title." | ": ""); ?>Hubly</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link href="<?php p(OCP\Util::linkto('hubly', 'css/normalize.css')); ?>" media="all" rel="stylesheet">
		<link href="<?php p(OCP\Util::linkto('hubly', 'css/foundation.min.css')); ?>" media="all" rel="stylesheet">
		<link href="<?php p(OCP\Util::linkto('hubly', 'css/hubly.css')); ?>" media="all" rel="stylesheet">
		<link href="<?php p(OCP\Util::linkto('hubly', 'css/sommet-rounded.css')); ?>" media="all" rel="stylesheet">
		<link href="<?php p(OCP\Util::imagePath('hubly', 'hubly.svg' )); ?>" rel="shortcut icon" type="image/vnd.microsoft.icon">
		<script src="<?php p(OCP\Util::linkto('hubly', 'js/custom.modernizr.js')); ?>"></script>
		<link rel="apple-touch-icon" href="<?php p(OCP\Util::imagePath('hubly', 'apple-touch-icon-57x57.png' )); ?>" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php p(OCP\Util::imagePath('hubly', 'apple-touch-icon-114x114.png')); ?>" />
	</head>
	<body>
		<header>
			<div class="row">
				<nav class="large-12 columns">
					<a href="<?php p(OCP\Util::linkToRoute('hubly_index')); ?>" class="left standard">Home</a>
					<a href="<?php p(OCP\Util::linkToRoute('hubly_index')); ?>" class="header-logo"><img src="<?php p(OCP\Util::imagePath('hubly', 'hubly-logo.svg' )); ?>" alt="Hubly" class="hubly-logo" /></a>
					<?php if($_['uid']) {  ?>
						<a href="<?php p(OCP\Util::linkToRoute('hubly_index')); ?>" class="right"><?php p($_['uname']); ?></a>
					<?php } else { ?>
						<a href="<?php p(OCP\Util::linkToRoute('hubly_login')); ?>" class="right">Login</a>
					<?php } ?>
				</nav>
			</div>
		</header>
		<?php if ($_['response']) { $response = json_decode($_['response'], true); ?>
			<div class="row">
				<div class="large-12 columns">
					<div data-alert class="alert-box radius<?php if ($response['status']=='error') { p(" alert"); }
						elseif ($response['status']=='success') {p(" success");} ?>">
						<?php p($response['message']); ?>
						<a href="#" class="close">&times;</a>
					</div>
				</div>
			</div>
		<?php } ?>
		<section>