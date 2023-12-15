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
        <script defer src="<?= base_url("assets/vendor/fontawesome/js/all.min.js") ?>"></script>

        <!-- App CSS -->
        <link id="theme-style" rel="stylesheet" href="<?= base_url("assets/css/portal.css") ?>">
        <link id="theme-style" rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">

    </head>

    <body>
        <header class="app-header h-auto fixed-top">
            <div class="app-header-inner ms-0">
                <div class="container-fluid py-2">
                    <div class="app-header-content">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <a class="navbar-brand" href="#">
                                <img src="<?= base_url('assets/images/logo/crafting_connections_logo.svg') ?>" alt="Logo" width="100%" height="48" class="d-inline-block align-text-top" />
                            </a>
                            </div>
                            <div class="app-utilities col-auto">
                                <?php if ($is_user_logged_in === false || $is_user_logged_in === null): ?>
                                    <a href="<?= base_url('/login') ?>" class="btn btn-primary">Login</a>
                                <?php else: ?>
                                    <div class="app-utility-item app-user-dropdown dropdown">
                                        <a class="dropdown-toggle" id="user-front-dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"><img src="<?= base_url('assets/images/user.png')?>" alt="user profile"/></a>
                                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                            <li><a class="dropdown-item" href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                                            <li><a class="dropdown-item" href="<?= base_url('/dashboard') ?>">Account</a></li>
                                            <li><a class="dropdown-item" href="settings.html">Settings</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Log
                                                    Out</a></li>
                                        </ul>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="main-container">
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
        <!-- Bootstrap Javascript -->
        <script src="<?= base_url("assets/vendor/popper.min.js") ?>"></script>
        <script src="<?= base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    </body>

</html>