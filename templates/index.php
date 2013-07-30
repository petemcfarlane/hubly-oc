{% set title = "Home" %}
{% include '_header.php' %}
{% if settings or aps or devices %}
	<div class="row">
		<h1 class="align-middle">Your data</h1>
	</div>
	<div class="row gray-bg">
		<div class="large-4 columns ">
	        <h3><a href="{{ url('hubly.page.settings') }}">Settings</a></h3>
			{% if settings %}
				<ul class="preference-list">
					{% for setting in settings %}
				        <li><a href="#">{{ setting.key }}</a></li>
				    {% endfor %}
		        </ul>
				{# if settings|length > 10 OC_Hubly::paginate() #} 
			{% else %}
				<p>You haven't added any settings yet, so it looks a little empty</p>
			{% endif %}
	    </div>

	    <div class="large-4 columns">
	        <h3><a href="{{ url('hubly.page.apps') }}">Apps</a></h3>
			{% if apps %}
				<ul class="apps-list">
					{% for app in apps %}
				        <li><a href="#">{{ app.name }}</a></li>
				    {% endfor %}
				</ul>
				{# if apps|length > 10 OC_Hubly::paginate() #} 
			{% else %}
				<p>You haven't added any apps yet, so it looks a little empty</p>
			{% endif %}
	    </div>

	    <div class="large-4 columns">
	        <h3><a href="{{ url('hubly.page.devices') }}">Devices</a></h3>
			{% if devices %}
				<ul class="device-list">
					{% for device in devices %}
				        <li><a href="#">{{ device.name }}</a></li>
				    {% endfor %}
				</ul>
				{# if devices|length > 10 OC_Hubly::paginate() #} 
			{% else %}
				<p>You haven't added any devices yet, so it looks a little empty</p>
			{% endif %}
	    </div>
{% else %}
	<div class="row">
		<h1 class="align-center large-12 columns">Welcome to Hubly</h1>
		<p class="large-12 columns">Hello {{ uname }}, thanks for giving Hubly a try. It looks like you haven't added any devices, apps or saved any data yet so there's not a lot to see, but this is the place where you will be able to see all of that informatino in the near future.</p>
		<h2 class="large-12 columns">So let's get you set up!</h2>
	</div>
{% endif %}
{% include "_footer.php" %}