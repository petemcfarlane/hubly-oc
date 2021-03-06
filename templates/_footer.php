		</section>
		<footer class="footer">
			<hr />
			<div class="row">
				<div class="large-3 columns">&copy; Hubly {{ now|date("Y") }}</div>
				<div class="large-9 columns">
					<ul class="inline-list right">
						<li><a href="{{ url('hubly.page.index') }}">Home</a></li>
						<li><a href="{{ url('hubly.page.help') }}">Help</a></li>
						<li><a href="{{ url('hubly.page.about') }}">About</a></li>
						<li><a href="{{ url('hubly.page.contact') }}">Contact</a></li>
						<li><a href="{{ url('hubly.page.privacy_policy') }}">Privacy</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script src="/core/js/jquery-1.10.2.min.js"></script>
		<script src="/apps/hubly/js/foundation.min.js"></script>
		<script src="/apps/hubly/js/foundation/foundation.dropdown.js"></script>
		<script src="/apps/hubly/js/hubly.js"></script>
	</body>
</html>