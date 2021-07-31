<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('site.index2');
// });

Route::get('/', 'SiteController@lapor_diri');
Route::resource('customsearch', 'CustomSearchController');
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');
Route::get('/akses_terbatas','AuthController@akses_terbatas');
Route::get('/get_keldesa/{id}','KelurahanController@keldesa');

Route::post('/lapor-diri/submit','SiteController@submit');
Route::get('/lapor-diri/sukses','SiteController@sukses');

Route::get('/reload-captcha','SiteController@reloadCaptcha');

Route::group(['middleware'=>['auth','checkRole:admin,superadmin']],function(){
    Route::get('/dashboard','DashboardController@index');
    
    Route::get('/user','UsersController@index');
    Route::post('/user/tambah_user','UsersController@tambah');
    Route::get('/user/{user}/edit','UsersController@edit');
    Route::get('/user/{user}/delete','UsersController@delete');

    Route::resource('/master-data/kecamatan','KecamatanController');
    Route::resource('/master-data/kelurahan','KelurahanController');
    Route::resource('/master-data/kategori_pemenang','Kategori_pemenangController');
    Route::resource('/master-data/formstatus','FormstatusController');
    Route::resource('/master-data/tempat_test','TempattestController');

    Route::get('/banner','BannerController@index');
    Route::post('/banner/tambah','BannerController@tambah');
    Route::get('/banner/{banner}/edit','BannerController@edit');
    Route::post('/banner/{banner}/update','BannerController@update');
    Route::get('/banner/{banner}/delete','BannerController@delete');

    Route::get('/data-lapor-diri','LapordiriController@index');
    Route::get('/data-lapor-diri/{id}/detail','LapordiriController@detail');
    Route::get('/data-lapor-diri/{id}/delete','LapordiriController@delete');
    Route::get('/data-lapor-diri/exportexcel','LapordiriController@exportexcel');
});

Route::group(['middleware'=>['auth','checkRole:admin,superadmin']],function(){
    Route::get('/dashboard','DashboardController@index');
    
    Route::post('/user/{user}/update','UsersController@update');
    Route::post('/user/{id}/ganti_password','UsersController@ganti_password');

    Route::group(['prefix'=>'profil'], function(){
        Route::get('/{user}','UsersController@profil');
        Route::post('/{id}/update_profil','UsersController@update_profil');
        Route::post('/{id}/ganti_password','UsersController@ganti_password_profil');
    });
    

});
Route::group(['middleware'=>['auth','checkRole:superadmin']],function(){
    Route::get('/pendaftaran/{pendaftaran}/delete','PendaftaranController@delete');
});

Route::get('/table/kecamatan', 'KecamatanController@dataTable')->name('table.kecamatan');
Route::get('/table/kelurahan', 'KelurahanController@dataTable')->name('table.kelurahan');
Route::get('/table/formstatus', 'FormstatusController@dataTable')->name('table.formstatus');
Route::get('/table/tempat_test', 'TempattestController@dataTable')->name('table.tempat_test');

Route::get('/table/users', 'UsersController@dataTable')->name('table.users');

Route::get('/table/lapor_diri', 'LapordiriController@dataTable')->name('table.lapor_diri');