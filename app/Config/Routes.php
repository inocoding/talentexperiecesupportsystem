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
$routes->post('masterdata/viewmutasi', 'Masterdata::viewmutasi');

$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');
$routes->get('/', 'Home::index');
$routes->resource('users');

$routes->get('userimport', 'UserImport::index');
$routes->post('userimport/upload', 'UserImport::upload');

$routes->get('userimport', 'UserImport::index');
$routes->post('userimport/upload', 'UserImport::upload');
$routes->post('userimport/processChunk', 'UserImport::processChunk');


$routes->get('/tb_mpp', 'tb_mpp::index');

$routes->group('mutasiimport', static function($routes) {
    $routes->post('upload', 'MutasiImport::upload');
    $routes->post('processChunk', 'MutasiImport::processChunk');
});

$routes->group('users', ['namespace' => 'App\Controllers'], static function($routes){
    $routes->get('list', 'UsersApi::list'); // get unt datatables
    $routes->post('store', 'UsersApi::store'); // POST tambah
    $routes->post('update/(:segment)', 'UsersApi::update/$1'); // POST edit (PK = nip, string)
    $routes->post('delete', 'UsersApi::delete'); //POST hapus (bulk)
});

