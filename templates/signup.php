{% set title = "Sign up" %}
{% include '_header.php' %}
<div class="row">
	<div class="large-6 columns large-offset-3">
		<h1>Sign up</h1>
		<form method="post" action="{{ url('hubly.page.signup') }}">
			<label for="sign_up_display_name" class="hide">Display name</label>
			<input id="sign_up_display_name" type="text" name="name" placeholder="Your Name" {{ response.code == 1 ? 'class="error"' }}{% if args.name %}value="{{ args.name }}" {% endif %}/>
			<label for="sign_up_email" class="hide">Email address</label>
			<input id="sign_up_email" type="email" name="email" placeholder="Your Email" {% if response.code == 2 or response.code == 6 %}class="error"{% endif %}{% if args.email and response.code != 6 %}value="{{ args.email }}" {% endif %}/>
			<label for="sign_up_email_confirmation" class="hide">Email address confirmation</label>
			<input id="sign_up_email_confirmation" type="email" name="email_confirmation" placeholder="Confirm Email"{% if response.code == 3 or response.code == 6 or response.code == 4 %}class="error"{% endif %}{% if args.email and response.code != 3 and response.code != 4 and response.code != 6 %}value="{{ args.email }}" {% endif %}/>
			<label for="sign_up_password" class="hide">Password</label>
			<input id="sign_up_password" type="password" name="password" placeholder="Password" {{ response.code == 5 ? 'class="error"' }}/>
			<input type="submit" value="Sign up" class="button small right" />
		</form>
	</div>
</div>
{% include '_footer.php' %}