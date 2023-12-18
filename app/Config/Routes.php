<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Common Routes

$routes->get('/', 'Common\HomeController::index');

$routes->get('signup', 'Auth\SignupController::index', ['filter' => 'loginAuthGuard']);
$routes->post('signup', 'Auth\SignupController::store');

$routes->get('login', 'Auth\LoginController::index', ['filter' => 'signupAuthGuard']);
$routes->post('login', 'Auth\LoginController::loginAuth');

$routes->get('reset-password', 'Auth\ForgotPasswordController::index');
$routes->post('reset-password', 'Auth\ForgotPasswordController::resetPasswordLinkSentAction');
$routes->match(['get', 'post'],'reset-password/(:alphanum)', 'Auth\ForgotPasswordController::resetPasswordAction/$1');

$routes->get('logout', 'Auth\AuthController::logoutAuth');

// Dashboard Routes
$routes->group('', ['filter' => 'dashboardAuthGuard'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard\DashboardController::index');
    $routes->get('dashboard/account', 'Dashboard\UserController::index');
    $routes->match(['get', 'post'],'dashboard/account/update/avatar', 'Dashboard\UserController::updateAvatar');
    $routes->get('dashboard/article', 'Dashboard\ArticleController::index');
    $routes->match(['get', 'post'],'dashboard/article/create', 'Dashboard\ArticleController::createArticle');
});
