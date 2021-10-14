<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
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
$routes->get('/', 'HomeController::index');

$routes->group('uploads', function($routes){
    $routes->post('files', 'UploadsController::files', ['as' => 'upload-tugas']);
});

$routes->group('peserta', function($routes){
    $routes->get('biodata', 'HomeController::biodata', ['as' =>'biodata-peserta']);
    $routes->group('tugas', function($routes){
        $routes->get('diklat', 'TugasController::diklat', ['as' =>'tugas-diklat']);
        $routes->get('review-buku', 'TugasController::reviewBuku', ['as' =>'tugas-review-buku']);
        $routes->get('diorama', 'TugasController::diorama', ['as' =>'tugas-diorama']);
        $routes->get('karya-tulis', 'TugasController::karyaTulis', ['as' =>'tugas-karya-tulis']);
        $routes->get('video', 'TugasController::video', ['as' =>'tugas-video']);
        $routes->get('antologi', 'TugasController::antologi', ['as' =>'tugas-antologi']);
        $routes->get('literasi-kota', 'TugasController::literasiKota', ['as' =>'tugas-literasi-kota']);
    });
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
