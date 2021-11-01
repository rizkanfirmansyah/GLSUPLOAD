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

$routes->get('/', 'PesertaController::index');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'],function($routes){
    
    $routes->get('/', function(){
        return redirect()->route('pages-admin-login');
    });
    
    $routes->get('login', 'AdminController::login', ['as' => 'pages-admin-login']);

    $routes->group('pages', function($routes){
        $routes->get('/', 'AdminController::index', ['as' => 'pages-admin-index']);
        // $routes->get('dashboard', 'AdminController::dashboard', ['as' => 'pages-admin-dashboard']);

        $routes->group('detail', ['namespace' => 'App\Controllers\Admin'], function($routes){
            $routes->get('biodata/(:num)/(:alphanum)', 'DetailController::biodata/$1/$2', ['as' => 'detail-admin-biodata']);
            $routes->get('diklat/(:num)/(:alphanum)', 'DetailController::diklat/$1/$2', ['as' => 'detail-admin-diklat']);
            $routes->get('antologi/(:num)/(:alphanum)', 'DetailController::antologi/$1/$2', ['as' => 'detail-admin-antologi']);
            $routes->get('book/(:num)/(:alphanum)', 'DetailController::book/$1/$2', ['as' => 'detail-admin-book']);
            $routes->get('diorama/(:num)/(:alphanum)', 'DetailController::diorama/$1/$2', ['as' => 'detail-admin-diorama']);
            $routes->get('karya/(:num)/(:alphanum)', 'DetailController::karya/$1/$2', ['as' => 'detail-admin-karya']);
            $routes->get('video/(:num)/(:alphanum)', 'DetailController::video/$1/$2', ['as' => 'detail-admin-video']);
            $routes->get('literasi/(:num)/(:alphanum)', 'DetailController::literasi/$1/$2', ['as' => 'detail-admin-literasi']);
            $routes->get('partisipasi/(:num)/(:alphanum)', 'DetailController::partisipasi/$1/$2', ['as' => 'detail-admin-partisipasi']);
        });

        $routes->group('rekap', ['namespace' => 'App\Controllers\Admin'], function($routes){
            $routes->get('peserta', 'RekapController::peserta', ['as' => 'rekap-peserta']);
            $routes->get('diklat', 'RekapController::diklat', ['as' => 'rekap-diklat']);
            $routes->get('book', 'RekapController::book', ['as' => 'rekap-book']);
            $routes->get('review', 'RekapController::review', ['as' => 'rekap-review']);
            $routes->get('diorama', 'RekapController::diorama', ['as' => 'rekap-diorama']);
            $routes->get('karya', 'RekapController::karya', ['as' => 'rekap-karya']);
            $routes->get('partisipasi', 'RekapController::partisipasi', ['as' => 'rekap-partisipasi']);
            $routes->get('video', 'RekapController::video', ['as' => 'rekap-video']);
            $routes->get('literasi', 'RekapController::literasi', ['as' => 'rekap-literasi']);
            $routes->get('puisi', 'RekapController::puisi', ['as' => 'rekap-puisi']);
            $routes->get('pantun', 'RekapController::pantun', ['as' => 'rekap-pantun']);
            $routes->get('literasi-media', 'RekapController::literasiMedia', ['as' => 'rekap-literasi-media']);
            $routes->get('literasi-kota', 'RekapController::literasiKota', ['as' => 'rekap-literasi-kota']);
            $routes->get('antologi', 'RekapController::antologi', ['as' => 'rekap-antologi']);
        });

    });

    $routes->group('api', ['namespace' => 'App\Controllers\Admin'], function($routes){
        $routes->post('auth', 'AdminApiController::auth', ['as' => 'api-admin-auth']);
        $routes->get('logout', 'AdminApiController::logout', ['as' => 'api-admin-logout']);
        $routes->post('delete-diklat', 'AdminApiController::delete_diklat', ['as' => 'api-admin-delete-diklat']);
        $routes->post('delete-book', 'AdminApiController::delete_book', ['as' => 'api-admin-delete-book']);
        $routes->post('delete-review', 'AdminApiController::delete_review', ['as' => 'api-admin-delete-review']);
        $routes->post('delete-antologi', 'AdminApiController::delete_antologi', ['as' => 'api-admin-delete-antologi']);
        $routes->post('delete-diorama', 'AdminApiController::delete_diorama', ['as' => 'api-admin-delete-diorama']);
        $routes->post('delete-karya', 'AdminApiController::delete_karya', ['as' => 'api-admin-delete-karya']);
        $routes->post('delete-puisi', 'AdminApiController::delete_puisi', ['as' => 'api-admin-delete-puisi']);
        $routes->post('delete-pantun', 'AdminApiController::delete_pantun', ['as' => 'api-admin-delete-pantun']);
        $routes->post('delete-video', 'AdminApiController::delete_video', ['as' => 'api-admin-delete-video']);
        $routes->post('delete-kota', 'AdminApiController::delete_kota', ['as' => 'api-admin-delete-kota']);
        $routes->post('delete-media', 'AdminApiController::delete_media', ['as' => 'api-admin-delete-media']);
        $routes->post('delete-assestment', 'AdminApiController::delete_assestment', ['as' => 'api-admin-delete-assestment']);
        $routes->post('delete-partisipasi', 'AdminApiController::delete_partisipasi', ['as' => 'api-admin-delete-partisipasi']);
        $routes->post('delete-peserta', 'AdminApiController::delete_peserta', ['as' => 'api-admin-delete-peserta']);
    });

    $routes->group('datatable', ['namespace' => 'App\Controllers\Admin'], ['filter' => 'api-admin-auth'],function($routes){
        $routes->post('biodata', 'DatatableController::biodata', ['as' => 'datatable-biodata']);

        //Rekap Data
        $routes->get('peserta','DatatableController::peserta', ['as' => 'datatable-peserta']);
        $routes->get('diklat','DatatableController::diklat', ['as' => 'datatable-diklat']);
        $routes->get('partisipasi','DatatableController::partisipasi', ['as' => 'datatable-partisipasi']);
        $routes->get('literasi','DatatableController::literasi', ['as' => 'datatable-literasi']);
        $routes->get('video','DatatableController::video', ['as' => 'datatable-video']);
        $routes->get('karya','DatatableController::karya', ['as' => 'datatable-karya']);
        $routes->get('book','DatatableController::book', ['as' => 'datatable-book']);
        $routes->get('review','DatatableController::review', ['as' => 'datatable-review']);
        $routes->get('diorama','DatatableController::diorama', ['as' => 'datatable-diorama']);
        $routes->get('puisi','DatatableController::puisi', ['as' => 'datatable-puisi']);
        $routes->get('pantun','DatatableController::pantun', ['as' => 'datatable-pantun']);
        $routes->get('literasi-media','DatatableController::literasiMedia', ['as' => 'datatable-literasi-media']);
        $routes->get('literasi-kota','DatatableController::literasiKota', ['as' => 'datatable-literasi-kota']);
        $routes->get('antologi','DatatableController::antologi', ['as' => 'datatable-antologi']);
    });

});

$routes->group('peserta', ['namespace' => 'App\Controllers'], function($routes){
    $routes->get('/', 'PesertaController::index', ['as' => 'mukadimah']);
    $routes->get('biodata/(:alphanum)', 'PesertaController::biodata/$1', ['as' =>'biodata-peserta']);

    $routes->group('tugas', function($routes){

        $routes->get('diklat/(:num)/(:alphanum)', 'TugasController::diklat/$1/$2', ['as' =>'tugas-diklat']);
        $routes->get('baca-buku/(:num)/(:alphanum)', 'TugasController::bacaBuku/$1/$2', ['as' =>'tugas-baca-buku']);
        $routes->get('review-buku/(:num)/(:alphanum)', 'TugasController::reviewBuku/$1/$2', ['as' =>'tugas-review-buku']);
        $routes->get('diorama/(:num)/(:alphanum)', 'TugasController::diorama/$1/$2', ['as' =>'tugas-diorama']);
        $routes->get('karya-tulis/(:num)/(:alphanum)', 'TugasController::karyaTulis/$1/$2', ['as' =>'tugas-karya-tulis']);
        $routes->get('video/(:num)/(:alphanum)', 'TugasController::video/$1/$2', ['as' =>'tugas-video']);
        $routes->get('antologi/(:num)/(:alphanum)', 'TugasController::antologi/$1/$2', ['as' =>'tugas-antologi']);
        $routes->get('literasi-kota/(:num)/(:alphanum)', 'TugasController::literasiKota/$1/$2', ['as' =>'tugas-literasi-kota']);
        $routes->get('literasi-media/(:num)/(:alphanum)', 'TugasController::literasiMedia/$1/$2', ['as' => 'tugas-literasi-media']);
        $routes->get('literasi-assestment/(:num)/(:alphanum)', 'TugasController::literasiAssestment/$1/$2', ['as'=> 'tugas-literasi-assestment']);
        $routes->get('partisipasi/(:num)/(:alphanum)', 'TugasController::partisipasi/$1/$2', ['as'=> 'tugas-partisipasi']);
        $routes->get('selesai', 'TugasController::selesai', ['as'=> 'selesai']);
    });

    $routes->group('kelengkapan', function($routes){
        $routes->get('/', 'KelengkapanController::index', ['as' => 'kelengkapan']);
        $routes->post('cek', 'KelengkapanController::cek', ['as' => 'kelengkapan-cek']);
    });
});

$routes->group('api',['namespace' => 'App\Controllers\Api'], function($routes){

    // $routes->group('biodata', ['namespace' => 'App\Controllers\Api'], function($routes){
    //     $routes->post('insert', 'ApiController::biodata', ['as' => 'api-biodata']);
    // });
    $routes->post('biodata/', 'ApiController::biodata', ['as' => 'api-biodata']);

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

    $routes->group('count', ['namespace' => 'App\Controllers\Api'], function($routes){
        $routes->post('diklat', 'CountController::diklat', ['as' => 'api-count-diklat']);
        $routes->post('buku', 'CountController::book', ['as' => 'api-count-buku']);
        $routes->post('review', 'CountController::review', ['as' => 'api-count-review']);
        $routes->post('diorama', 'CountController::diorama', ['as' => 'api-count-diorama']);
        $routes->post('karya', 'CountController::karya', ['as' => 'api-count-karya']);
        $routes->post('video', 'CountController::video', ['as' => 'api-count-video']);
        $routes->post('antologi', 'CountController::antologi', ['as' => 'api-count-antologi']);
        $routes->post('kota', 'CountController::kota', ['as' => 'api-count-kota']);
        $routes->post('media', 'CountController::media', ['as' => 'api-count-media']);
        $routes->post('assestment', 'CountController::assestment', ['as' => 'api-count-assestment']);
        $routes->post('partisipasi', 'CountController::partisipasi', ['as' => 'api-count-partisipasi']);
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
