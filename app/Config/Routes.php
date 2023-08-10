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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Cara Penulisan
// $routes->metode_request('route','controller::method');

// DEFAULT
// $routes->get('/', 'Home::index');

$routes->get('/', 'Pages::index');
$routes->get('/movies/save', 'Movies::save');
$routes->get('/slider/save', 'Slider::save');
$routes->get('/pesan/save', 'Pesan::save');
$routes->get('/movies/create', 'Movies::create');
$routes->get('/slider/create', 'Slider::create');
// $routes->get('/pesan/create', 'Pesan::create');
$routes->get('/movies/edit/(:segment)', 'Movies::edit/$1');
$routes->get('/slider/edit/(:segment)', 'Slider::edit/$1');
$routes->get('/pesan/edit/(:segment)', 'Pesan::edit/$1');
$routes->delete('movies/(:num)', 'Movies::delete/$1');
$routes->delete('slider/(:num)', 'Slider::delete/$1');
$routes->delete('pesan/(:num)', 'Pesan::delete/$1');
$routes->get('/movies/(:any)', 'Movies::detail/$1');
$routes->get('/pesan/pesan/(:any)', 'Pesan::pesan/$1');



// $routes->get('/coba', 'Coba::index');  
// $routes->get('/coba/index', 'Coba::index');
// $routes->get('/coba/nama', 'Coba::nama');
// Cara Penulisan (Anonymous Function) : Langsung mengerjakan sesuatu tanpa menggunakan controller & method
// $routes->get('/coba', function() {
//     echo "PERKENALKAN NAMA SAYA ARYA BAGUS PERMONO";
// });
// Cara Penulisan (Manipulasi Data)
// $routes->get('/coba/(:num)/(:any)', 'Coba::kelas/$1/$2');

// Mengatur Jalur/Rute Untuk Namespace Admin, Controller User, Method Index
// $routes->get('/users', 'Admin\Users::index');

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
