<?php $title="Settings"; ?>
<?php include_once('_header.php'); ?>
<?php 
$settings = OC_Hubly::getSettings($_['uid']);
if ($settings) { ?>
	
<?php } else { ?>
	<div class="row">
		<h3 class="align-center">You haven't saved any settings yet, so this page is looking rather empty. Come back once you've created some data.</h3>
		<p class="align-center">For information on saving settings see the <a href="<?php p(OCP\Util::linkToRoute('hubly_help')); ?>#saving-data">help file</a></p>
	</div>
<?php } ?>
<?php include_once('_footer.php'); ?>