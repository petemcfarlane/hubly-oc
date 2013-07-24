<?php $title="Sign up"; ?>
<?php include_once("_header.php"); print$response['code']?>

<div class="row">
	<div class="large-6 columns large-offset-3">
		<h1>Sign up</h1>

		<form method="post" action="<?php p(OCP\Util::linkToRoute('hubly_signup')); ?>">
			<label for="sign_up_display_name" class="hide">Display name</label>
			<input id="sign_up_display_name" type="text" name="name" placeholder="Your Name" <?php print_unescaped($response['code']==1 ? 'class="error" ' : "value=\"$args[name]\" "); ?>/>
			<label for="sign_up_email" class="hide">Email address</label>
			<input id="sign_up_email" type="email" name="email" placeholder="Your Email" <?php print_unescaped($response['code']==2 || $response['code']==4 || $response['code']==6 ? 'class="error" ' : "value=\"$args[email]\" "); ?>/>
			<label for="sign_up_email_confirmation" class="hide">Email address confirmation</label>
			<input id="sign_up_email_confirmation" type="email" name="email_confirmation" placeholder="Confirm Email" <?php print_unescaped($response['code']==3 || $response['code']==6 || $response['code']==4 ? 'class="error" ' : "value=\"$args[email]\" "); ?>/>
			<label for="sign_up_password" class="hide">Password</label>
			<input id="sign_up_password" type="password" name="password" placeholder="Password" <?php print_unescaped($response['code']==5 ? 'class="error" ' : ""); ?>/>
			<input type="submit" value="Sign up" class="button small right" />
		</form>
	</div>
</div>

<?php include_once("_footer.php"); ?>