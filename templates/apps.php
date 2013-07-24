<?php $title="Apps"; ?>
<?php include_once('_header.php'); ?>
<?php $apps = OC_Hubly::getApps($_['uid']);
if ($apps) { ?>
	
<?php } else { ?>
	<div class="row">
		<h3 class="align-center">You haven't added any apps yet, so this page is looking rather empty. Come back once you've added an app.</h3>
		<p class="align-center">For information on adding apps see the <a href="<?php p(OCP\Util::linkToRoute('hubly_help')); ?>#apps">help file</a></p>
	</div>
<?php } ?>
<?php include_once('_footer.php'); ?>