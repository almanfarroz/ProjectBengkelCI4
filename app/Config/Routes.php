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
$routes->get('/', 'MainController::index', ['as' => 'home']);

// Supplier
$routes->get('/listsupplier', 'SupplierController::list', ['as' => 'list_supplier']);
$routes->get('/listsupplier/(:num)/edit', 'SupplierController::edit/$1', ['as' => 'edit_supplier']);
$routes->post('/listsupplier/(:num)/edit/update', 'SupplierController::update/$1', ['as' => 'update_supplier']);
$routes->get('/listsupplier/create', 'SupplierController::create', ['as' => 'create_supplier']);
$routes->post('/listsupplier/create/save', 'SupplierController::save', ['as' => 'save_supplier']);
$routes->get('/listsupplier/(:num)/delete', 'SupplierController::delete/$1', ['as' => 'delete_supplier']);

//product
$routes->get('/listproduct', 'ProductController::list', ['as' => 'list_product']);
$routes->get('/listproduct/(:num)/edit', 'ProductController::edit/$1', ['as' => 'edit_product']);
$routes->post('/listproduct/(:num)/edit/update', 'ProductController::update/$1', ['as' => 'update_product']);
$routes->get('/listproduct/create', 'ProductController::create', ['as' => 'create_product']);
$routes->post('/listproduct/create/save', 'ProductController::save', ['as' => 'save_product']);
$routes->get('/listproduct/(:num)/delete', 'ProductController::delete/$1', ['as' => 'delete_product']);

// Authentication
$routes->get('/login', 'AuthController::signin', ['as' => 'login']);
$routes->post('/login/auth', 'AuthController::loginauth', ['as' => 'auth']);

$routes->get('/register', 'AuthController::register', ['as' => 'register']);
$routes->post('/register/store', 'AuthController::store', ['as' => 'store']);

$routes->get('/logout', 'AuthController::logout', ['as' => 'logout']);

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
