<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Codeigniter 4 Practice">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="#E64545">
	<title><?= $head_title; ?></title>
	<link rel="icon" href="/favicon.ico"/>
	<link rel="icon" href="/icon.svg" type="image/svg+xml"/>
	<!-- CSS Links -->
	<!-- Bootstrap 4.5 CSS  -->
	<link rel="stylesheet" href="assets/front/css/bootstrap.min.css" crossorigin="anonymous"/>
	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/front/css/style.css"/>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="javascript:void(0);">CI_4_APP</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="javascript:void(0);">Home<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= route_to('signup') ?>">Signup</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Dropdown
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="javascript:void(0);">Action</a>
							<a class="dropdown-item" href="javascript:void(0);">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="javascript:void(0);">Something else here</a>
						</div>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>
	</header>
	<main>
		<?= $this->renderSection('content'); ?>
	</main>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-12 environment">

					<p>Page rendered in {elapsed_time} seconds</p>

					<p>Environment: <?= ENVIRONMENT ?></p>

				</div>

				<div class="col-12 copyrights">

					<p class="m-0">&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
					open source licence.</p>

				</div>
			</div>
		</div>
	</footer>
	<!-- Scripts links -->
	<!-- Jquery CDN -->
	<script src="<?=base_url("https://code.jquery.com/jquery-3.6.0.slim.min.js")?>" crossorigin="anonymous"></script>
	<!-- Bootstrap 4.5 Script -->
	<script src="<?=base_url("assets/front/js/bootstrap.min.js")?>" crossorigin="anonymous"></script>
</body>
</html>