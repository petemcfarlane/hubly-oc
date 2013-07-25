{% set title = "Home" %}
{% include '_header.php' %}
{{ settings }}

$settings = \OCA\Hubly\Lib\App::getSettings($_['uid']);
$apps = OC_Hubly::getApps($_['uid']);
$devices = OC_Hubly::getDevices($_['uid']);

if ($settings || $apps || $devices) { ?>
	{{ 2+2 }}
	<div class="row">
		<h1 class="align-middle">Your data</h1>
	</div>
	<div class="row gray-bg">
		<div class="large-4 columns ">
	        <h3><a href="<?php p(OCP\Util::linkToRoute('hubly_settings'));?>">Settings</a></h3>
			<?php if ($settings) { ?>
				<ul class="preference-list">
		            <li><a href="#">Voicing tool preference: More Bass</a></li>
		            <li><a href="#">Voicing tool preference: Loudness Curve</a></li>
		            <li><a href="#">Voicing tool preference: New default</a></li>
		        </ul>
				<?php if (count($settings) > 10) OC_Hubly::paginate();
			} else { ?>
				<p>You haven't added any settings yet, so it looks a little empty</p>
			<?php } ?>
	    </div>

	    <div class="large-4 columns">
	        <h3><a href="<?php p(OCP\Util::linkToRoute('hubly_apps'));?>">Apps</a></h3>
			<?php if ($apps) { ?>
				<ul class="apps-list">
					<li><a href="#">Sontia - Hear the difference</a></li>
				</ul>
				<?php if (count($apps) > 10) OC_Hubly::paginate();
			} else { ?>
				<p>You haven't added any apps yet, so it looks a little empty</p>
			<?php } ?>
	    </div>

	    <div class="large-4 columns">
	        <h3><a href="<?php p(OCP\Util::linkToRoute('hubly_devices'));?>">Devices</a></h3>
			<?php if ($devices) { ?>
				<ul class="device-list">
					<li><a href="#">Pete's iPhone</a></li>
				</ul>
				<?php if (count($devices) > 10) OC_Hubly::paginate();
			} else { ?>
				<p>You haven't added any devices yet, so it looks a little empty</p>
			<?php } ?>
	    </div>
<?php } else { ?>
	<div class="row">
		<h1 class="align-center large-12 columns">Welcome to Hubly</h1>
		<p class="large-12 columns">Hello <?php p($_['uname']); ?>, thanks for giving Hubly a try. It looks like you haven't added any devices, apps or saved any data yet so there's not a lot to see, but this is the place where you will be able to see all of that informatino in the near future.</p>
		<h2 class="large-12 columns">So let's get you set up!</h2>
	</div>
<?php } ?>
<?php include_once("_footer.php"); ?>