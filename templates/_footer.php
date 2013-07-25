		</section>
		<footer class="footer">
			<hr />
			<div class="row">
				<div class="large-3 columns">&copy; Hubly {{ now|date("Y") }}</div>
				<div class="large-9 columns">
					<ul class="inline-list right">
						<li><a href="{{ url('hubly_index') }}">Home</a></li>
						<li><a href="{{ url('hubly_help') }}">Help</a></li>
						<li><a href="{{ url('hubly_about') }}">About</a></li>
						<li><a href="{{ url('hubly_contact') }}">Contact</a></li>
						<li><a href="{{ url('hubly_privacy_policy') }}">Privacy</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script src="/core/js/jquery-1.10.2.min.js"></script>
		<script src="/apps/hubly/js/foundation.min.js"></script>
		<script src="/apps/hubly/js/hubly.js"></script>
	</body>
</html>
