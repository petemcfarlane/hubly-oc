<?php include_once("_header.php"); ?>

<div class="row">
	<div class="large-6 columns large-offset-3">
		<h1>Login</h1>
		<form method="post" action="<?php p(OCP\Util::linkto('','index.php')); ?>">
			<input type="hidden" name="redirect_url" value="<?php p(OCP\Util::LinkToRoute("root_path")); ?>" />
			<label for="login_email">Your email</label>
			<input id="login_email" type="text" name="user" placeholder="Email"/>
			<label for="login_password">Your password</label>
			<input id="login_password" type="password" name="password" placeholder="Password" />
			<input type="submit" value="Login" class="button" />
		</form>
	</div>
</div>

<?php include_once("_footer.php"); ?>