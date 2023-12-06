<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Common Routes

$routes->get('/', 'Common\HomeController::index');

$routes->get('signup', 'Auth\SignupController::index', ['filter' => 'loginAuthGuard']);
$routes->match(['get', 'post'], 'signup', 'Auth\SignupController::store');

$routes->get('login', 'Auth\LoginController::index', ['filter' => 'signupAuthGuard']);
$routes->match(['get', 'post'], 'login', 'Auth\LoginController::loginAuth');

$routes->get('forgot-password', 'Auth\ForgotPasswordController::index');
$routes->match(['get', 'post'], 'forgot-password', 'Auth\ForgotPasswordController::forgotPasswordAction');

$routes->get('logout', 'Auth\AuthController::logoutAuth');

// Dashboard Routes
$routes->get('dashboard', 'Dashboard\DashboardController::index', ['filter' => 'dashboardAuthGuard']);
