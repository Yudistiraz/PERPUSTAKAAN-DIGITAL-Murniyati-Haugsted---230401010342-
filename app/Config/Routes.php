<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// Default Routing
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('dashboard');
$routes->setTranslateURIDashes(false);
$routes->set404Override();



// -------------------- ADMIN ROUTES --------------------
$routes->get('admin/login', 'Auth::adminLoginForm');
$routes->post('admin/login', 'Auth::adminLogin');
$routes->get('admin/logout', 'Auth::adminLogout');
$routes->get('admin/dashboard', 'Dashboard::index');

// CRUD buku admin
$routes->get('admin/buku', 'Buku::index');
$routes->get('admin/buku/create', 'Buku::create');
$routes->post('admin/buku/save', 'Buku::save');
$routes->get('admin/buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('admin/buku/update/(:num)', 'Buku::update/$1');
$routes->get('admin/buku/delete/(:num)', 'Buku::delete/$1');



// -------------------- USER ROUTES --------------------
$routes->get('/', 'Home::dashboard');
$routes->get('/buku', 'Home::buku');
$routes->get('/buku/(:num)', 'Home::detail/$1');

// Login User
$routes->get('/login', 'Auth::userLoginForm');
$routes->post('/login', 'Auth::userLogin');
$routes->get('/logout', 'Auth::userLogout');

// Pengguna - Katalog Buku
$routes->get('/buku', 'Home::buku');
$routes->get('/buku/(:num)', 'Home::detail/$1');

// Pinjam & Kembalikan Buku (untuk user)
$routes->get('/buku/pinjam/(:num)', 'Home::pinjam/$1');
$routes->get('/buku/kembalikan/(:num)', 'Home::kembalikan/$1');

$routes->get('buku/pinjam/(:num)', 'PeminjamanController::pinjam/$1');
$routes->get('buku/kembalikan/(:num)', 'PeminjamanController::kembalikan/$1');

$routes->get('/pinjam/(:num)', 'PeminjamanController::pinjam/$1');
$routes->get('/kembalikan/(:num)', 'PeminjamanController::kembalikan/$1');
$routes->get('/riwayat', 'PeminjamanController::riwayat');

$routes->get('pinjam/(:num)', 'Pinjam::pinjam/$1');         // tampilkan form
$routes->post('pinjam/simpan', 'Pinjam::simpan');           // proses simpan

$routes->get('kembalikan/(:num)', 'Pinjam::kembalikan/$1');

$routes->get('buku/pinjam/(:num)', 'PeminjamanController::pinjam/$1');
$routes->get('buku/kembalikan/(:num)', 'PeminjamanController::kembalikan/$1');
$routes->post('buku/pinjam/(:num)', 'PeminjamanController::prosesPinjam/$1');

$routes->get('buku', 'Home::katalog');
$routes->get('buku/pinjam/(:num)', 'Home::pinjam/$1');
$routes->get('buku/kembalikan/(:num)', 'Home::kembalikan/$1');

$routes->get('user/dashboard', 'User::dashboard');
$routes->get('user/search', 'User::search');





