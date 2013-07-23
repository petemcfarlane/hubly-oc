<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Hubly</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link href="<?php p(OCP\Util::linkto('hubly', 'css/normalize.css')); ?>" media="all" rel="stylesheet">
		<link href="<?php p(OCP\Util::linkto('hubly', 'css/foundation.min.css')); ?>" media="all" rel="stylesheet">
		<link href="<?php p(OCP\Util::linkto('hubly', 'css/hubly.css')); ?>" media="all" rel="stylesheet">
		<link href="<?php p(OCP\Util::linkto('hubly', 'css/sommet-rounded.css')); ?>" media="all" rel="stylesheet">
		<link href="<?php p(OCP\Util::imagePath('hubly', 'hubly.svg' )); ?>" rel="shortcut icon" type="image/vnd.microsoft.icon">
		<script src="<?php p(OCP\Util::linkto('hubly', 'js/custom.modernizr.js')); ?>"></script>
	</head>
	<body>
		<header>
			<div class="row">
				<nav class="large-12 columns">
					<a href="<?php p(OCP\Util::linkToRoute('root_path')); ?>" class="left standard">Home</a>
					<a href="<?php p(OCP\Util::linkToRoute('root_path')); ?>" class="header-logo"><img src="<?php p(OCP\Util::imagePath('hubly', 'hubly-logo.svg' )); ?>" alt="Hubly" class="hubly-logo" /></a>
					<?php if($_['uid']) {  ?>
						<a href="#" class="right"><?php p($_['uname']); ?></a>
					<?php } else { ?>
						<a href="<?php p(OCP\Util::linkToRoute('login_path')); ?>" class="right">Login</a>
					<?php } ?>
				</nav>
			</div>
		</header>
		<section>
