{% set title = 'Settings' %}
{% include '_header.php' %}
<div class="row">
	{% if settings %}
		<ul class="preference-list">
			{% if settings|length == 1 %}
		        <li><a href="#">{{ settings.key }} : {{ settings.value }}</a></li>
			{% else %}
				{% for setting in settings %}
					<li><a href="#">{{ setting.key }} : {{ setting.value }}</a></li>
			    {% endfor %}
			{% endif %}
	    </ul>
		{# if settings|length > 10 OC_Hubly::paginate() #} 
	{% else %}
		<h3 class="align-center">You haven't saved any settings yet, so this page is looking rather empty. Come back once you've created some data.</h3>
		<p class="align-center">For information on saving settings see the <a href="{{ url('hubly.page.help') }}#saving-data">help file</a></p>
	{% endif %}
</div>
{% include '_footer.php' %}
