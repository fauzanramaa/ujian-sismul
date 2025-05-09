<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', '\App\Controllers\Peminjaman::index');

// Routes untuk Peminjaman
$routes->get('peminjaman', 'Peminjaman::index', ['as' => 'peminjaman.index']);
$routes->get('peminjaman/create', 'Peminjaman::create', ['as' => 'peminjaman.create']);
$routes->post('peminjaman/store', 'Peminjaman::store');
$routes->get('peminjaman/edit/(:num)', 'Peminjaman::edit/$1', ['as' => 'peminjaman.edit']);
$routes->put('peminjaman/update/(:num)', 'Peminjaman::update/$1', ['as' => 'peminjaman.deleteAll']);
$routes->delete('peminjaman/delete/(:num)', 'Peminjaman::delete/$1', ['as' => 'peminjaman.delete']);
$routes->post('peminjaman/delete-all', 'Peminjaman::deleteAll', ['as' => 'peminjaman.deleteAll']);