{% set title = 'Account Settings' %}
{% include '_header.php' %}
<div class="row">
	<div class="large-6 columns large-offset-3">
		<h1 class="align-center">Your account settings</h1>
		<p>Your Name: {{ uname }}</p>
		<p>Your Email: {{ uid }}<sup>* can't be changed</sup></p>
		<p>Change password</p>
	</div>
</div>
{% include '_footer.php' %}