<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Crafting Connections - An Blog Web Community" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-title" content="Crafting Connections" />
	<meta name="application-name" content="Crafting Connections" />
	<meta name="msapplication-TileColor" content="#da532c" />
	<meta name="theme-color" content="#ffffff" />

	<link rel="icon" href="<?= base_url("assets/favicon/favicon.ico") ?>" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url("assets/favicon/apple-touch-icon.png") ?>" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url("assets/favicon/favicon-32x32.png") ?>" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/favicon/favicon-16x16.png") ?>" />
	<link rel="manifest" href="<?= base_url("assets/favicon/site.webmanifest") ?>" />
	<link rel="mask-icon" href="<?= base_url("assets/favicon/safari-pinned-tab.svg") ?>" color="#5bbad5" />

	<title><?= $head_title; ?></title>

	<!-- FontAwesome JS-->
	<script defer src="<?= base_url("assets/plugins/fontawesome/js/all.min.js") ?>"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="<?= base_url("assets/css/portal.css") ?>">

</head>

<body>
	<header>
		<nav class="navbar bg-body-tertiary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="<?= base_url('assets/images/logo/crafting_connections_logo.svg') ?>" alt="Logo" width="100%" height="48" class="d-inline-block align-text-top" />
				</a>
				<div>
					<a href="<?= route_to('signup') ?>" class="btn btn-primary">Signup</a>
					<div class="app-utility-item app-user-dropdown dropdown">
						<a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png" alt="user profile"></a>
						<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
							<li><a class="dropdown-item" href="account.html">Account</a></li>
							<li><a class="dropdown-item" href="settings.html">Settings</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="login.html">Log Out</a></li>
						</ul>
					</div><!--//app-user-dropdown-->
				</div>
			</div>
		</nav>
	</header>

	<main>
		<?= $this->renderSection('content'); ?>
	</main>

	<footer>
		<div class="container-fluid bg-body-tertiary">
			<div class="row">
				<div class="col-12 bg-body-secondary py-3 text-center">
					<p class="m-0">Page rendered in {elapsed_time} seconds</p>
					<p class="m-0">Environment &#8282; <?= ENVIRONMENT ?></p>
				</div>
				<div class="col-12 py-4">
					<p class="m-0">&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT open source licence.</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Scripts links -->
	<!-- Bootstrap Script -->
	<script src="<?= base_url("assets/plugins/popper.min.js") ?>"></script>
	<script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.min.js") ?>"></script>
	<!-- Page Specific JS -->
	<script src="<?= base_url("assets/js/app.js") ?>"></script>

</body>

</html>