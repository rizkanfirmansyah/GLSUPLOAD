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
$routes->setDefaultController('PesertaController');
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
// $routes->get('/', function (){
//     return redirect('mukadimah');   
// });

$routes->get('/', 'PesertaController::index');

$routes->group('peserta', ['namespace' => 'App\Controllers'], function($routes){
    $routes->get('/', 'PesertaController::index', ['as' => 'mukadimah']);
    $routes->get('biodata/(:alphanum)', 'PesertaController::biodata/$1', ['as' =>'biodata-peserta']);

    $routes->group('tugas', function($routes){

        $routes->get('diklat', 'TugasController::diklat', ['as' =>'tugas-diklat']);
        $routes->get('baca-buku', 'TugasController::bacaBuku', ['as' =>'tugas-baca-buku']);
        $routes->get('review-buku', 'TugasController::reviewBuku', ['as' =>'tugas-review-buku']);
        $routes->get('diorama', 'TugasController::diorama', ['as' =>'tugas-diorama']);
        $routes->get('karya-tulis', 'TugasController::karyaTulis', ['as' =>'tugas-karya-tulis']);
        $routes->get('video', 'TugasController::video', ['as' =>'tugas-video']);
        $routes->get('antologi', 'TugasController::antologi', ['as' =>'tugas-antologi']);
        $routes->get('literasi-kota', 'TugasController::literasiKota', ['as' =>'tugas-literasi-kota']);
        $routes->get('literasi-media', 'TugasController::literasiMedia', ['as'=> 'tugas-literasi-media']);
        $routes->get('literasi-assestment', 'TugasController::literasiAssestment', ['as'=> 'tugas-literasi-assestment']);
        $routes->get('partisipasi', 'TugasController::partisipasi', ['as'=> 'tugas-partisipasi']);
        $routes->get('selesai', 'TugasController::selesai', ['as'=> 'selesai']);
    });
});

$routes->group('api',['namespace' => 'App\Controllers\Api'], function($routes){

    $routes->group('biodata', ['namespace' => 'App\Controllers\Api'], function($routes){
        $routes->post('insert', 'ApiController::biodata', ['as' => 'api-biodata']);
    });

    $routes->group('tugas',['namespace' => 'App\Controllers\Api'], function($routes){
        $routes->post('diklat', 'ApiController::diklat', ['as' => 'api-diklat']);
        $routes->post('baca-buku', 'ApiController::bacaBuku', ['as' => 'api-baca-buku']);
        $routes->post('review-buku', 'ApiController::reviewBuku', ['as' => 'api-review-buku']);
        $routes->post('diorama', 'ApiController::diorama', ['as' => 'api-diorama']);
        $routes->post('karya-tulis', 'ApiController::karyaTulis', ['as' => 'api-karya-tulis']);
        $routes->post('video', 'ApiController::video', ['as' => 'api-video']);
        $routes->post('antologi', 'ApiController::antologi', ['as' => 'api-antologi']);
        $routes->post('literasi-kota', 'ApiController::literasiKota', ['as' => 'api-literasi-kota']);
        $routes->post('literasi-media', 'ApiController::literasiMedia', ['as' => 'api-literasi-media']);
        $routes->post('literasi-assestment', 'ApiController::literasiAssestment', ['as' => 'api-literasi-assestment']);
        $routes->post('partisipasi', 'ApiController::partisipasi', ['as' => 'api-partisipasi']);
    });

    $routes->group('get', ['namespace' => 'App\Controllers\Api'], function($routes){
        $routes->get('prev-nik/(:num)/(:alphanum)', 'ApiController::prevNik/$1/$2', ['as' => 'api-get-prev-nik']);
    });


});

// $routes->group('resume', function ($routes) {
//     $routes->post('insert', 'ApiController::insert_resume', ['as' => 'insert-resume']);
// });


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
