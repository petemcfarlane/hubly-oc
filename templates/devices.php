{% set title = 'Devices' %}
{% include '_header.php' %}
<div class="row">
	{% if devices %}
		<ul class="device-list">
			{% for device in devices %}
		        <li><a href="#">{{ device.name }}</a></li>
		    {% endfor %}
	    </ul>
		{# if devices|length > 10 OC_Hubly::paginate() #} 
	{% else %}
		<h3 class="align-center">You haven't saved any devices yet, so this page is looking rather empty. Come back once you've added some devices.</h3>
		<p class="align-center">For information on saving settings see the <a href="{{ url('hubly_help') }}#devices">help file</a></p>
	{% endif %}
</div>
{% include '_footer.php' %}
