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

$routes->group('mutasiimport', ['filter' => 'auth|role:role_mutasi'], static function($routes) {
    $routes->post('upload', 'MutasiImport::upload');
    $routes->post('processChunk', 'MutasiImport::processChunk');
});

$routes->group('masterdata', static function ($r) {
    // ... route yang sudah ada
    $r->get('users_json',        'Masterdata::users_json');          // list untuk DataTables
    $r->get('user_show/(:segment)','Masterdata::user_show/$1');      // ambil 1 user (edit)
    $r->post('user_store',       'Masterdata::user_store');          // tambah
    $r->post('user_update/(:segment)','Masterdata::user_update/$1'); // edit (by nip)
    $r->post('user_delete/(:segment)','Masterdata::user_delete/$1'); // hapus (by nip)
});

$routes->get('masterdata/users/(:segment)/edit', 'Masterdata::editUser/$1');
$routes->post('masterdata/users/(:segment)', 'Masterdata::updateUser/$1');
$routes->post('masterdata/users/(:segment)/delete', 'Masterdata::deleteUser/$1');

$routes->post('DapegImport/resetStaging', 'DapegImport::resetStaging');
$routes->get('etl', 'EtlController::index');
$routes->post('etl/run', 'EtlController::run');


