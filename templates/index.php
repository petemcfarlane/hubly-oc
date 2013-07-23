<?php $title = "Home";
include_once("_header.php");
$settings = OC_Hubly::getSettings($_['uid']);
$apps = OC_Hubly::getApps($_['uid']);
$devices = OC_Hubly::getDevices($_['uid']);

if ($settings || $apps || $devices) { ?>
	<div class="row">
		<h1 class="align-middle">Your data</h1>
	</div>
	<div class="row gray-bg">
		<div class="large-4 columns ">
	        <h3><a href="<?php p(OCP\Util::linkToRoute('settings_path'));?>">Settings</a></h3>
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
	        <h3><a href="<?php p(OCP\Util::linkToRoute('apps_path'));?>">Apps</a></h3>
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
	        <h3><a href="<?php p(OCP\Util::linkToRoute('devices_path'));?>">Devices</a></h3>
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
		<h1 class="align-center">Welcome to Hubly</h1>
		<p>Hello <?php p($_['uname']); ?>, thanks for giving Hubly a try. It looks like you haven't added any devices, apps or saved any data yet so there's not a lot to see, but this is the place where you will be able to see all of that informatino in the near future.</p>
		<h2>So let's get you set up!</h2>
	</div>
<?php } ?>
<?php include_once("_footer.php"); ?>