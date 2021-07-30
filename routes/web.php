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
Route::get('/get_kab/{id}','KoperasiController@kab');
Route::get('/get_kec/{id}','KoperasiController@kec');
Route::get('/get_keldesa/{id}','KoperasiController@keldesa');

Route::post('/pendaftaran/kirim','SiteController@kirim');
Route::get('/pendaftaran-gowes','SiteController@pendaftaran');
Route::get('/pendaftaran/sukses/{id}','SiteController@sukses');
Route::get('/simpan-no-pendaftaran/{id}','SiteController@cetak_pendaftaran');

Route::get('/kirim-hasil-gowes','HasilgowesController@index');
Route::post('/kirim-hasil-gowes/kirim','HasilgowesController@create');
Route::get('/kirim-hasil-gowes/sukses','HasilgowesController@sukses');

Route::get('/sertifikat-gowes','SiteController@cetak_sertifikat');
Route::get('/download-sertifikat','SiteController@download_sertifikat');

Route::post('/cetak-no-peserta','SiteController@cetak_no_peserta');
Route::get('/reload-captcha','SiteController@reloadCaptcha');

Route::get('/cek-pendaftaran/{nik}','PendaftaranController@cek_daftar');

Route::group(['middleware'=>['auth','checkRole:admin,superadmin']],function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/pemenang','PemenangController@index');
    Route::get('/pemenang/{id}','PemenangController@pemenang_kategori');
    Route::post('/pemenang-kategori/tambah','PemenangController@tambah_pemenang');
    Route::get('/pemenang/{id}/delete','PemenangController@delete');
    Route::get('/pemenang/get-record/{id}','PemenangController@get_record');
    Route::post('/pemenang-k/edit','PemenangController@edit_pemenang');
    
    Route::get('/user','UsersController@index');
    Route::post('/user/tambah_user','UsersController@tambah');
    Route::get('/user/{user}/edit','UsersController@edit');
    Route::get('/user/{user}/delete','UsersController@delete');

    Route::get('/pendaftaran','PendaftaranController@index');
    Route::get('/pendaftaran/{pendaftaran}/detail','PendaftaranController@detail');
    Route::get('/pendaftaran/{pendaftaran}/edit','PendaftaranController@edit');
    Route::post('/daftar/{pendaftaran}/update','PendaftaranController@update');
    Route::get('/pendaftaran/exportexcel', 'PendaftaranController@exportExcel');

    //Route::get('/excel-submit-gowes/08', 'HasilgowesController@export08');
    Route::get('/excel-submit-gowes/17', 'HasilgowesController@export17');
    Route::get('/excel-submit-gowes/28', 'HasilgowesController@export28');
    Route::get('/excel-submit-gowes/45', 'HasilgowesController@export45');
    Route::get('/excel-submit-gowes/75', 'HasilgowesController@export75');
    Route::get('/excel-submit-gowes/76', 'HasilgowesController@export76');

    Route::get('/hasil_gowes','HasilgowesController@list_hasil');
    Route::get('/hasil_gowes/{id}/detail','HasilgowesController@detail');
    Route::post('/hasil_gowes/{hasilgowes}/update','HasilgowesController@update');
    Route::get('/hasil_gowes/{hasilgowes}/delete','HasilgowesController@delete');
    Route::get('/print-submit-gowes/{kategori}','HasilgowesController@cetak_laporan_kategori');
    Route::get('/print-pendaftaran/{kategori}','PendaftaranController@cetak_pendaftaran_kategori');

    Route::get('/hasil_gowes/{id}/edit','HasilgowesController@edit');
    Route::post('/hasil/store','HasilgowesController@store');

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

    Route::get('/submit-gowes/{kategori}','HasilgowesController@data_kategori');
    Route::get('/pendaftaran/{kategori}','PendaftaranController@data_kategori');
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

Route::get('/table/pendaftaran', 'PendaftaranController@dataTable')->name('table.pendaftaran');
Route::get('/table/hasilgowes', 'HasilgowesController@dataTable')->name('table.hasilgowes');
Route::get('/table/users', 'UsersController@dataTable')->name('table.users');

Route::get('getdatalaporankategori/{kategori}', 'HasilgowesController@getdatalaporankategori');
Route::get('getpendaftarankategori/{kategori}', 'PendaftaranController@pendaftaran_kategori');
Route::get('/table/kategori_pemenang', 'Kategori_pemenangController@dataTable')->name('table.kategori_pemenang');
Route::get('get_pemenang_kategori/{id}', 'PemenangController@table_pemenang');