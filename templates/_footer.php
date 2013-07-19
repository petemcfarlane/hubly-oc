		</section>
		<footer class="footer">
			<hr />
			<div class="row">
				<div class="large-3 columns">&copy; Hubly <?php print date("Y"); ?></div>
				<div class="large-9 columns">
					<ul class="inline-list right">
						<li><a href="<?php p(OCP\Util::LinkToRoute('root_path')); ?>">Home</a></li>
						<li><a href="<?php p(OCP\Util::LinkToRoute('about_path')); ?>">About</a></li>
						<li><a href="<?php p(OCP\Util::LinkToRoute('contact_path')); ?>">Contact</a></li>
						<li><a href="<?php p(OCP\Util::LinkToRoute('privacyPolicy_path')); ?>">Privacy</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script src="<?php p(OCP\Util::linkto('core', 'js/jquery-1.10.0.min.js')); ?>"></script>
		<script src="<?php p(OCP\Util::linkto('hubly', 'js/foundation.min.js')); ?>"></script>
		<script src="<?php p(OCP\Util::linkto('hubly', 'js/hubly.js')); ?>"></script>
	</body>
</html>