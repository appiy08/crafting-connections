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

	<link rel="icon" href="<?=base_url("assets/favicon/favicon.ico")?>" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url("assets/favicon/apple-touch-icon.png")?>" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url("assets/favicon/favicon-32x32.png")?>" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url("assets/favicon/favicon-16x16.png")?>" />
	<link rel="manifest" href="<?=base_url("assets/favicon/site.webmanifest")?>" />
	<link rel="mask-icon" href="<?=base_url("assets/favicon/safari-pinned-tab.svg")?>" color="#5bbad5" />

	<title><?=$head_title;?></title>

	<!-- FontAwesome JS-->
	<script defer src="<?=base_url("assets/plugins/fontawesome/js/all.min.js")?>"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="<?=base_url("assets/css/portal.css")?>">

</head>

<body class="app app-signup p-0">
	<main>
		<?=$this->renderSection('content');?>
	</main>
</body>

</html>