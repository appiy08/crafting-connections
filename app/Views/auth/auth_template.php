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

	<title><?= ucfirst($head_title); ?></title>

	<!-- FontAwesome JS-->
	<script defer src="<?= base_url("assets/plugins/fontawesome/js/all.min.js") ?>"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="<?= base_url("assets/css/portal.css") ?>">
	<!-- Custom CSS  -->
	<link id="theme-style" rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">

</head>

<body class="app app-signup app-login p-0">
	<main>
		<?= $this->renderSection('content'); ?>
	</main>
	<!-- Scripts links -->
	<!-- Bootstrap Script -->
	<script src="<?= base_url("assets/plugins/popper.min.js") ?>"></script>
	<script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.min.js") ?>"></script>
	<!-- Page Specific JS -->
	<script>
		// select the password input field and the toggle button
		const password = document.querySelector("#password");
		const togglePassword = document.querySelector("#togglePassword");
		// add a click event listener to the toggle button
		togglePassword.addEventListener("click", function() {
			// toggle the type attribute of the password field
			const type = password.getAttribute("type") === "password" ? "text" : "password";
			password.setAttribute("type", type);
			// toggle the icon of the toggle button
			const togglePasswordIconEyeOn = document.querySelector("svg.fa-eye.toggle-password-icon");
			const togglePasswordIconEyeOff = document.querySelector("svg.fa-eye-slash.toggle-password-icon");
		
			if (type === "text") {
				// password is visible, change icon to slashed eye
				togglePasswordIconEyeOff.classList.remove("d-none");
				togglePasswordIconEyeOn.classList.add("d-none");
				
			} else {
				// password is hidden, change icon to eye
				togglePasswordIconEyeOn.classList.remove("d-none");
				togglePasswordIconEyeOff.classList.add("d-none");
				
			}
		});
	</script>
</body>

</html>