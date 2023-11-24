<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Common Routes

$routes->get('/', 'Common\HomeController::index');

$routes->get('signup', 'Auth\SignupController::index');
$routes->match(['get', 'post'], 'signup', 'Auth\SignupController::store');

$routes->get('login', 'Auth\LoginController::index');
$routes->match(['get', 'post'], 'login', 'Auth\LoginController::loginAuth');
$routes->get('logout', 'Auth\LoginController::logoutAuth');
$routes->get('profile', 'Auth\ProfileController::index', ['filter' => 'authGuard']);

// Dashboard Routes

$routes->get('dashboard', 'User\DashboardController::index',['filter' => 'authGuard']);
