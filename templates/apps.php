{% set title = 'Apps' %}
{% include '_header.php' %}
<div class="row">
	{% if apps %}
		<ul class="apps-list">
			{% for app in apps %}
		        <li><a href="#">{{ app.name }}</a></li>
		    {% endfor %}
	    </ul>
		{# if apps|length > 10 OC_Hubly::paginate() #} 
	{% else %}
		<h3 class="align-center">You haven't saved any apps yet, so this page is looking rather empty. Come back once you've added an app.</h3>
		<p class="align-center">For information on linking apps see the <a href="{{ url('hubly.page.help') }}#apps">help file</a></p>
	{% endif %}
</div>
{% include '_footer.php' %}