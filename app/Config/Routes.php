<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');

//Jenis
$routes->get('/fjenis', 'FormJenis::index');
$routes->get('/fjenis/create', 'FormJenis::create');
$routes->get('/fjenis/edit/(:num)', 'FormJenis::edit/$1');
//Barang
$routes->get('/fbarang', 'FormBarang::index');
$routes->get('/fbarang/create', 'FormBarang::create');
$routes->get('/fbarang/edit/(:num)', 'FormBarang::edit/$1');
//Transaksi
$routes->get('/ftransaksi', 'FormTransaksi::index');
//Laporan
$routes->get('/flaporan', 'FormLaporan::index');
$routes->get('/flaporan2', 'FormLaporan::index2');

//API Jenis
$routes->get('/jenis/search/(:segment)', 'Jenis::search/$1');
$routes->resource('jenis');
//API Barang
$routes->get('/barang/search/(:segment)', 'Barang::search/$1');
$routes->resource('barang');
//API Transaki
$routes->get('/transaksi/search/(:segment)', 'Transaksi::search/$1');
$routes->resource('transaksi');
//API Laporan
$routes->get('/laporan/search/(:any)/(:any)/(:any)', 'Laporan::search/$1/$2/$3');
$routes->get('/laporan/search2/(:any)/(:any)', 'Laporan::search2/$1/$2');
$routes->resource('laporan');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
