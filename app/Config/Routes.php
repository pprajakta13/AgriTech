<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =========================================
// Home
// =========================================
$routes->get('/', 'HomeController::index');

// =========================================
// User Pages
// =========================================
$routes->get('/crops', 'CropController::index');
$routes->get('/prices', 'PriceController::index');
$routes->get('/profit', 'ProfitController::index');
$routes->post('/profit/calculate', 'ProfitController::calculate');

// =========================================
// Authentication
// =========================================
$routes->get('/register', 'LoginController::register');
$routes->post('/register/store', 'LoginController::store');

$routes->get('/login', 'LoginController::login');
$routes->post('/login/authenticate', 'LoginController::authenticate');

$routes->get('/logout', 'LoginController::logout');

// =========================================
// Dashboards
// =========================================
$routes->get('/admin/dashboard', 'DashboardController::admin');
$routes->get('/user/dashboard', 'DashboardController::user');

// =========================================
// ADMIN - CROPS CRUD
// =========================================
$routes->get('/admin/crops', 'AdminCropController::index');

$routes->get('/admin/crops/create', 'AdminCropController::create');
$routes->post('/admin/crops/store', 'AdminCropController::store');

$routes->get('/admin/crops/edit/(:num)', 'AdminCropController::edit/$1');
$routes->post('/admin/crops/update/(:num)', 'AdminCropController::update/$1');

$routes->get('/admin/crops/delete/(:num)', 'AdminCropController::delete/$1');

// =========================================
// ADMIN - MANDI PRICE CRUD
// =========================================
$routes->get('/admin/prices', 'AdminPriceController::index');

$routes->get('/admin/prices/create', 'AdminPriceController::create');
$routes->post('/admin/prices/store', 'AdminPriceController::store');

$routes->get('/admin/prices/edit/(:num)', 'AdminPriceController::edit/$1');
$routes->post('/admin/prices/update/(:num)', 'AdminPriceController::update/$1');

$routes->get('/admin/prices/delete/(:num)', 'AdminPriceController::delete/$1');

// =========================================
// ADMIN - USERS
// =========================================
$routes->get('/admin/users', 'AdminUserController::index');
$routes->get('/admin/users/delete/(:num)', 'AdminUserController::delete/$1');