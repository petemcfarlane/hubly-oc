{# <?php $args = isset($_['args']) ? $_['args'] : NULL; ?> #}
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{% if title %}{{ title }} | {% endif %}Hubly</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link href="/apps/hubly/css/normalize.css" media="all" rel="stylesheet">
		<link href="/apps/hubly/css/foundation.min.css" media="all" rel="stylesheet">
		<link href="/apps/hubly/css/hubly.css" media="all" rel="stylesheet">
		<link href="/apps/hubly/css/sommet-rounded.css" media="all" rel="stylesheet">
		<link href="/apps/hubly/img/hubly.svg" rel="shortcut icon" type="image/vnd.microsoft.icon">
		<script src="/apps/hubly/js/custom.modernizr.js"></script>
		<link rel="apple-touch-icon" href="/apps/hubly/img/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="/apps/hubly/img/apple-touch-icon-114x114.png" />
	</head>
	<body>
		<header>
			<div class="row">
				<nav class="large-12 columns">
					<a href="{{ url('hubly_index') }}" class="left standard">Home</a>
					<a href="{{ url('hubly_index') }}" class="header-logo">
						<img src="/apps/hubly/img/hubly-logo.svg" alt="Hubly" class="hubly-logo" />
					</a>
					{% if uid %}
						<a href="{{ url('hubly_index') }}" class="right">{{ uname }}</a>
					{% else %}
						<a href="{{ url('hubly_login') }}" class="right">Login</a>
					{% endif %}
				</nav>
			</div>
		</header>
		{% if response.message %}
			<div class="row">
				<div class="large-12 columns">
					<div data-alert class="alert-box radius{% if response.status == 'error' %}{{ " alert" }}{% elseif response.status == 'success' %}{{ " success"}}{% endif %}">
						{{ response.message }}
						<a href="#" class="close">&times;</a>
					</div>
				</div>
			</div>
		{% endif %}
		<section>