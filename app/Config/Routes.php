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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
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
$routes->get('/', 'Auth::login');
$routes->get('data_cuti', 'Admin::save_data_cuti');
$routes->get('data_cuti', 'Admin::update_cuti');
$routes->get('data_pegawai', 'Auth::update_pegawai');
$routes->get('data_pegawai', 'Admin::delete_pegawai');
$routes->get('data_cuti', 'Admin::delete_cuti');
$routes->get('data_cuti_lvl1', 'Admin::accept_data_lvl1');
$routes->get('data_cuti_lvl2', 'Admin::accept_data_lvl2');
$routes->get('data_cuti_lvl3', 'Admin::accept_data_lvl3');
$routes->get('data_cuti_lvl1', 'Admin::decline_data_lvl1');
$routes->get('data_cuti_lvl2', 'Admin::decline_data_lvl2');
$routes->get('data_cuti_lvl3', 'Admin::decline_data_lvl3');
$routes->get('login', 'Auth::logout');
$routes->get('login', 'Auth::cek_login');
$routes->get('data_validation', 'Admin::update_validation');


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
