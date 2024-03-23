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
$routes->get('/', 'Home::index');

$routes->get('/dashboard', 'Admin\Admin::index');
$routes->get('/transaction', 'Admin\Admin::transaction');
$routes->get('/statistics', 'Admin\Admin::statistics');
$routes->get('/catlist', 'Admin\Admin::catlist');
$routes->get('/newcat', 'Admin\Admin::newcat');
$routes->post('/create_new_cat','Admin\Admin::create_new_cat');
$routes->get('/subcatlist', 'Admin\Admin::subcatlist');
$routes->get('/newsubcat', 'Admin\Admin::newsubcat');
$routes->get('/admin1', 'Admin\Admin::admin1');
$routes->get('/admin2', 'Admin\Admin::admin2');
$routes->get('/admin3', 'Admin\Admin::admin3');
$routes->get('/admin4', 'Admin\Admin::admin4');
$routes->get('/confirmcategory/(:any)','Admin\Admin::confirmCategory/$1');
$routes->get('/deletecategory/(:any)','Admin\Admin::dismissCategory/$1');
$routes->post('/deletecategory/(:any)','Admin\Admin::dismissCategory/$1');
$routes->get('/admin5', 'Admin\Admin::admin5');
$routes->get('/help', 'Admin\Admin::help');
$routes->get('/addrole', 'Admin\Admin::addRole');
$routes->get('/removerole', 'Admin\Admin::removeRole');
$routes->get('/getstartammount', 'Admin\Admin::getStartAmmount');
$routes->post('/setammount', 'Admin\Admin::setAmmount');
$routes->post('/step1', 'Bookings::step1');

service('auth')->routes($routes, ['except' => ['login','register']]);

$routes->get('login', 'Home::index');
$routes->get('register', 'Home::index');

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
