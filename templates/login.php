{% set title = "Login" %}
{% include '_header.php' %}
<div class="row">
	<div class="large-6 columns large-offset-3">
		<h1>Login</h1>
		<form method="post" action="{{ url("hubly.user.login") }}">
			<label for="login_email">Your email</label>
			<input id="login_email" type="text" name="email" placeholder="Email" {% if response.code == 1 %}class="error"{% endif %}{% if args.email %}value="{{ args.email }}" {% endif %}/>
			<label for="login_password">Your password</label>
			<input id="login_password" type="password" name="password" placeholder="Password" {% if response.code == 2 %}class="error"{% endif %}/>
			<input type="submit" value="Login" class="button" />
		</form>
		<p><a href="{{ url('hubly.page.signup') }}">Click here if you need to sign up</a></p>
	</div>
</div>
{% include '_footer.php' %}