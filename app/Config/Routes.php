<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Admin\Home');
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
// C:\xampp\htdocs\web-amalia2\app\Controllers\admin\Home.php
// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Admin\Home::index');
$routes->get('/manage_users', 'Admin\ManageUsers::index');

// manage events
$routes->get('/manage_events', 'Admin\ManageEvents::index');
$routes->get('/add_event', 'Admin\ManageEvents::tryadd');
$routes->post('/manage_events', 'Admin\ManageEvents::store');
// $routes->get('/manage_events/(:any)', 'Admin\ManageEvents::detail/$1');
$routes->get('/manage_events/edit/(:any)', 'Admin\ManageEvents::edit/$1');
$routes->delete('/manage_events/(:num)', 'Admin\ManageEvents::delete/$1');
$routes->get('/manage_events/delete/(:any)', 'Admin\ManageEvents::delete/$1');

$routes->get('/upload', 'Admin\TryInsert::index');
$routes->post('/upload/upload', 'Admin\TryInsert::upload');


$routes->get('/manage_santriwati', 'Admin\ManageSantriwati::index');
$routes->get('/jamaah', 'Admin\Jamaah::index');
$routes->get('/pelanggaran', 'Admin\Pelanggaran::index');
$routes->get('/prestasi', 'Admin\Prestasi::index');
$routes->get('/raport_penilaian', 'Admin\RaportPenilaian::index');
// $routes->addRedirect('/', 'admin/viewhome');

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
