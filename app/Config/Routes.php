<?php

use CodeIgniter\Router\RouteCollection;



/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->post('masterdata/addlist', 'masterdata::addlist');

$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');
$routes->get('/', 'Home::index');
$routes->resource('users');

$routes->get('userimport', 'UserImport::index');
$routes->post('userimport/upload', 'UserImport::upload');

$routes->get('userimport', 'UserImport::index');
$routes->post('userimport/upload', 'UserImport::upload');
$routes->post('userimport/processChunk', 'UserImport::processChunk');

