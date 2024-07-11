<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/kecamatan', 'Kecamatan::index');
$routes->post('/kecamatan/create', 'Kecamatan::create');
$routes->post('/kecamatan/update', 'Kecamatan::update');
$routes->get('/kecamatan/delete/(:num)', 'Kecamatan::delete/$1');
$routes->post('login', 'LoginController::process');
$routes->get('/logout', 'LoginController::logout');



