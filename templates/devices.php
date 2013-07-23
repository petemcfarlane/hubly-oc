<?php $title="Devices"; ?>
<?php include_once('_header.php'); ?>
<?php $devices = OC_Hubly::getDevices($_['uid']);
if ($devices) { ?>
	
<?php } else { ?>
	<div class="row">
		<h3 class="align-center">You haven't added any devices yet, so this page is looking rather empty. Come back once you've added a device.</h3>
		<p class="align-center">For information on adding devices see the <a href="<?php p(OCP\Util::linkToRoute('help_path')); ?>#devices">help file</a></p>
	</div>
<?php } ?>
<?php include_once('_footer.php'); ?>