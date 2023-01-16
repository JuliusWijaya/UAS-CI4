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
$routes->setDefaultController('Pages');
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
 * Route Definitionss
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/portfolio', 'Pages::portfolio');
$routes->get('/contact', 'Pages::contact');
$routes->get('/list/lapang', 'LapangList::index');
$routes->get('/list/lapang/create', 'LapangList::create');
$routes->post('/list/lapang/save', 'LapangList::save');
$routes->get('/list/lapang/(:any)/edit', 'LapangList::edit/$1');
$routes->get('/list/lapang/(:segment)/ubah', 'LapangList::ubah/$1');
$routes->post('/list/lapang/(:segment)/update', 'LapangList::update/$1');
$routes->delete('/list/lapang/(:num)/delete', 'LapangList::delete/$1');
//$routes->get('/list/lapang/(:segment)/delete', 'LapangList::delete/$1');

$routes->get('/setting/menu', 'SettingMenu::index');
$routes->post('/setting/menu/add', 'SettingMenu::create');
$routes->post('/setting/menu/(:segment)/update', 'SettingMenu::update/$1');
$routes->get('/setting/menu/(:segment)/edit', 'SettingMenu::edit/$1');
$routes->get('/setting/menu/(:segment)/delete', 'SettingMenu::delete/$1');

$routes->get('/orang', 'OrangList::index/$1');
$routes->post('/orang', 'OrangList::index/$1');
$routes->post('/orang/create', 'OrangList::create');
$routes->delete('/orang/(:segment)/delete', 'OrangList::delete/$1');
// $routes->get('/orang/(:any)/edit', 'OrangList::edit/$1');
$routes->post('/orang/(:segment)/update', 'OrangList::update/$1');



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