<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Online race registration services with low fees & free setup. Race reviews & maps. Race forms with social integration. Grow your race with powerful software." />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php
		//Bootstrap CSS
		echo HTML::style('media/css/bootstrap/bootstrap.min.css', NULL, TRUE, FALSE);
		//Main CSS
		echo HTML::style('media/css/main.css', NULL, TRUE, FALSE);
		?>
	</head>

	<body>
		<header class="navbar navbar-fixed-top" role="banner">
			<nav role="navigation" style="height: auto;">
				<ul class="nav nav-justified navbar-inverse">
					<li>
						<?php echo HTML::anchor("lab1/index", "Users", NULL, TRUE); ?>
					</li>
					<li>
						<?php echo HTML::anchor("lab1/create", "Create User", NULL, TRUE); ?>
					</li>
					<li>
						<?php
						$session = Session::instance();
						$activeUser = $session->get('username');
						if(isset($activeUser)){
							echo HTML::anchor("lab1/logout", "LOGOUT", NULL, TRUE);
						}
						else {
							echo HTML::anchor("lab1/login", "LOGIN", NULL, TRUE);
						}
						?>
					</li>
				</ul>
			</nav>
		</header>
		<div class="page_content container">
			<?= $content; ?>
		</div>

		<!--		Added scripts to bottom of BODY as it is more responsive. Check out http://developers.google.com/speed/pagespeed/insights/	-->
		<!-- JQuery -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<?php
		// Bootstrap JS
		echo HTML::script('media/js/bootstrap/bootstrap.min.js', NULL, TRUE, FALSE);
		?>

	</body>
</html>
