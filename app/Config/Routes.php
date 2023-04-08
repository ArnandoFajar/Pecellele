<?php

namespace Config;

use App\Controllers\Auth\LoginController;
use App\Controllers\BackendController;
use App\Controllers\FrontendController;
use App\Controllers\ReservasiController;
use App\Controllers\TestController;

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
$routes->get('/', [FrontendController::class,'index']);

$routes->get('/test',[TestController::class,'index']);

$routes->get('login', [LoginController::class,'loginView']);
$routes->post('login', [LoginController::class,'loginAction']);
$routes->get('logout', [LoginController::class,'logoutAction']);

$routes->get('admin', [BackendController::class,'dashboard']);

$routes->get('admin/menu', [BackendController::class,'menu']);
$routes->get('admin/menu/getmakanan',[BackendController::class,'getmakanan']);
$routes->get('admin/menu/getminuman',[BackendController::class,'getminuman']);
$routes->post('admin/menu/addmakanan',[BackendController::class,'addmakanan']);
$routes->post('admin/menu/addminuman',[BackendController::class,'addminuman']);
$routes->post('admin/menu/deletemakanan',[BackendController::class,'deletemakanan']);
$routes->post('admin/menu/deleteminuman',[BackendController::class,'deleteminuman']);
$routes->post('admin/menu/getmakananbyid',[BackendController::class,'getmakananbyid']);
$routes->post('admin/menu/getminumanbyid',[BackendController::class,'getminumanbyid']);
$routes->post('admin/menu/updatemakanan',[BackendController::class,'updatemakanan']);
$routes->post('admin/menu/updateminuman',[BackendController::class,'updateminuman']);

$routes->get('admin/galeri', [BackendController::class,'galeri']);
$routes->get('admin/galeri/getgaleri', [BackendController::class,'getgaleri']);
$routes->post('admin/galeri/addgaleri',[BackendController::class,'addgaleri']);
$routes->post('admin/galeri/deletegaleri',[BackendController::class,'deletegaleri']);
$routes->post('admin/galeri/getgaleribyid',[BackendController::class,'getgaleribyid']);
$routes->post('admin/galeri/updategaleri',[BackendController::class,'updategaleri']);

$routes->get('admin/reservasi', [BackendController::class,'reservasi']);
$routes->get('admin/reservasi/getreservasi', [ReservasiController::class,'getreservasi']);
$routes->post('addreservasi', [FrontendController::class,'addreservasi']);
$routes->post('admin/reservasi/getreservasibyid', [ReservasiController::class,'getreservasibyid']);
$routes->post('admin/reservasi/updatereservasi', [ReservasiController::class,'updatereservasi']);
$routes->post('admin/reservasi/deletereservasi', [ReservasiController::class,'deletereservasi']);



//Customer
$routes->resource('customer', ['controller' => 'Customers']);
$routes->get('getcustomers', 'Customers::getCustomers');

service('auth')->routes($routes);

service('auth')->routes($routes);
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
