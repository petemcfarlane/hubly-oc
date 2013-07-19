<?php include_once("_header.php"); ?>

<div class="row">
	<div class="large-6 columns">
		<h3>Hubly is a free to use personal hub where you can safely store and sync your personal settings for many apps across multiple platforms and devices.</h3>
	</div>
	<div class="large-6 columns">
		<h3 class="primary">Sign up for free</h3>
		<form method="post" action="<?php p(OCP\Util::linkToRoute('signup_path')); ?>">
			<label for="sign_up_display_name" class="hide">Display name</label>
			<input type="hidden" name="groups[]" value="hubly" />
			<input id="sign_up_display_name" type="text" name="name" placeholder="Your Name" />
			<label for="sign_up_email" class="hide">Email address</label>
			<input id="sign_up_email" type="email" name="email" placeholder="Your Email" />
			<label for="sign_up_email_confirmation" class="hide">Email address confirmation</label>
			<input id="sign_up_email_confirmation" type="email" name="email_confirmation" placeholder="Confirm Email" />
			<div class="row">
				<div class="small-9 columns">
					<label for="sign_up_password" class="hide">Password</label>
					<input id="sign_up_password" type="password" name="password" placeholder="Password" />
				</div>
				<div class="small-3 columns">
					<input type="submit" value="Sign up" class="button small right" />
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="large-12 columns">
		<ul data-orbit>
			<li>
				<img src="<?php p(OCP\Util::imagePath('hubly', 'cogs.jpg' )); ?>">
			</li>
			<li>
				<img src="<?php p(OCP\Util::imagePath('hubly', 'space.jpg' )); ?>">
			</li>
			<li>
				<img src="<?php p(OCP\Util::imagePath('hubly', 'sky.jpg' )); ?>">
			</li>
		</ul>
	</div>
</div>
	
<div class="row">
	<div class="large-6 columns overflow-auto">
		<img src="<?php p(OCP\Util::imagePath('hubly', 'texting.jpg' )); ?>">
		<div class="panel callout">
			<h5 class="white">Automatically save and load your personal preferences on all your devices</h5>
		</div>
	</div>
	<div class="large-6 columns overflow-auto">
		<img src="<?php p(OCP\Util::imagePath('hubly', 'park.jpg' )); ?>">
		<div class="panel callout">
			<h5 class="white">Share settings with other users or keep your preferences private</h5>
		</div>
	</div>
</div>

<div class="row">
	<div class="large-6 columns overflow-auto">
		<img src="<?php p(OCP\Util::imagePath('hubly', 'sad.jpg' )); ?>">
		<div class="panel callout">
			<h5 class="white">Create a backup of your settings, should one of your devices fail</h5>
		</div>
	</div>
	<div class="large-6 columns overflow-auto">
		<img src="<?php p(OCP\Util::imagePath('hubly', 'social.jpg' )); ?>">
		<div class="panel callout">
			<h5 class="white">Be part of the wider hubly community, feed your preferences back to developers and designers to improve future products</h5>
		</div>
	</div>
</div>

<?php include_once("_footer.php"); ?>