{% set title = "Login" %}
{% include '_header.php' %}

<div class="row">
	<div class="large-6 columns large-offset-3">
		<h1>Login</h1>
		<form method="post" action="/">
			<input type="hidden" name="redirect_url" value="{{ url("hubly_index") }}" />
			<label for="login_email">Your email</label>
			<input id="login_email" type="text" name="user" placeholder="Email"/>
			<label for="login_password">Your password</label>
			<input id="login_password" type="password" name="password" placeholder="Password" />
			<input type="submit" value="Login" class="button" />
		</form>
	</div>
</div>

{% include '_footer.php' %}
