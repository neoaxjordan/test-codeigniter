<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Prueba
$routes->get('/main', 'Home::showMain');
// CRUD RestFul Routes
$routes->get('/show', 'OrdenCrud::index');
$routes->get('/create', 'OrdenCrud::create');
$routes->post('/submit', 'OrdenCrud::store');
$routes->get('/edit/(:num)', 'OrdenCrud::singleOrden/$1');
$routes->post('/update', 'OrdenCrud::update');
$routes->get('/delete/(:num)', 'OrdenCrud::delete/$1');
// ajax
$routes->get('/ajax/show', 'OrdenCrud::ajaxIndex');
$routes->get('/ajax/edit/(:num)', 'OrdenCrud::ajaxEdit/$1');
$routes->post('/ajax/save', 'OrdenCrud::ajaxSave');
$routes->post('/ajax/delete/(:num)', 'OrdenCrud::ajaxDelete/$1');
$routes->get('/ajax/ordenId', 'OrdenCrud::ajaxOrdenId');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
