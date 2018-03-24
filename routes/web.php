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

// Authentication routes

Route::get('/', 'SubUnitController@index');
Route::get('/home', 'SubUnitController@index');

Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/storePengadaan', 'PengadaanController@store');

    Route::get('/listBarang', 'BarangController@index');
    Route::get('/data-tanah', 'BarangController@dataTanah');
    Route::get('/data-mesin', 'BarangController@dataMesin');
    Route::get('/data-bangunan', 'BarangController@dataBangunan');
    Route::get('/data-jalirja', 'BarangController@dataJalirja');
    Route::get('/data-aset', 'BarangController@dataAset');
    Route::get('/data-kontruksi', 'BarangController@dataKontruksi');
    Route::get('/data-bph', 'BarangController@dataBph');

    /**
     * Route untuk subunit
     */
    Route::group(['middleware' => 'subunit', 'prefix' => 'subunit', 'as' => 'subunit'], function()
    {
    	Route::get('/home', 'SubUnitController@index');
		Route::get('/', 'SubUnitController@index');
        Route::get('/input-kegiatan', 'SubUnitController@inputKegiatan');
        Route::post('/store-kegiatan', 'SubUnitController@storeKegiatan');
        Route::get('/kegiatan/{id}', 'SubUnitController@kegiatanPengadaan');
        Route::get('/pengadaan/{id}', 'SubUnitController@pengadaan');
        Route::post('/store-pengadaan', 'SubUnitController@storePengadaan');
        Route::get('/data-pengadaan/{id}', 'SubUnitController@dataPengadaan');
        Route::get('/list-kegiatan', 'SubUnitController@listKegiatan');
        Route::get('/data-kegiatan', 'SubUnitController@dataKegiatan');
        // Route::get('/inputBarang', 'SubUnitController@inputBarang');
        Route::get('/formInputBarang/{id}', 'SubUnitController@formInputBarang')->name('.formInputBarang');
        Route::post('/storeBarang', 'SubUnitController@storeBarang');

       Route::get('/pdf-pengadaan', 'SubUnitController@pdfPengadaan')->name('.pdfPengadaan');
       Route::post('/upload-berita-acara', 'SubUnitController@uploadBeritaAcara');

       Route::get('/input-barang-kegiatan', 'SubUnitController@inputBarangKegiatan');
       Route::get('/data-barang-kegiatan', 'SubUnitController@dataBarangKegiatan');
       Route::get('/barang-kegiatan/{id}', 'SubUnitController@barangKegiatan');
       Route::get('/data-barang-pengadaan/{id}', 'SubUnitController@dataBarangPengadaan');

       Route::get('/export-word', 'WordController@exportWord')->name('.exportWord');

       Route::get('/edit-pengadaan/{id}', 'SubUnitController@editPengadaan');
       Route::get('/update-pengadaan', 'SubUnitController@updatePengadaan');
       Route::post('/update-pengadaan', 'SubUnitController@updatePengadaan')->name('.updatePengadaan');
    });

	/**
     * Route untuk unit
     */
    Route::group(['middleware' => 'unit', 'prefix' => 'unit', 'as' => 'unit'], function()
    {
    	Route::get('/home', 'UnitController@index');
		Route::get('/', 'UnitController@index');
        Route::get('/list-kegiatan', 'UnitController@listKegiatan')->name('.list-kegiatan');
        Route::get('/data-kegiatan', 'UnitController@dataKegiatan')->name('.data-kegiatan');
        Route::get('/kegiatan/{id}', 'UnitController@kegiatanPengadaan')->name('.kegiatan');
        Route::get('/data-pengadaan/{id}', 'UnitController@dataPengadaan')->name('.data-pengadaan');
        Route::get('/approve/{id}', 'UnitController@approve')->name('.approve');
        Route::get('/tolak/{id}', 'UnitController@tolak')->name('.tolak');

        Route::get('/list-barang', 'BarangController@unit')->name('.listBarang');
        // Route::get('/getData', 'UnitController@getDataPengadaan');
    });    

    /**
     * Route untuk bidang
     */
    Route::group(['middleware' => 'bidang', 'prefix' => 'bidang', 'as' => 'bidang'], function() {
        Route::get('/home', 'BidangController@index');
        Route::get('/', 'BidangController@index'); 
        Route::get('/list-kegiatan', 'BidangController@listKegiatan')->name('.list-kegiatan');
        Route::get('/data-kegiatan', 'BidangController@dataKegiatan')->name('.data-kegiatan');
        Route::get('/kegiatan/{id}', 'BidangController@kegiatanPengadaan')->name('.kegiatan');
        Route::get('/data-pengadaan/{id}', 'BidangController@dataPengadaan')->name('.data-pengadaan');
        Route::get('/approve/{id}', 'BidangController@approve')->name('.approve');
        Route::get('/tolak/{id}', 'BidangController@tolak')->name('.tolak');
        Route::get('/list-users', 'BidangController@getUsers')->name('.listUsers');
        Route::get('/list-barang', 'BarangController@bidang')->name('.listBarang');
    });  
});


/*
|--------------------------------------------------------------------------
| Style Example Routes
|--------------------------------------------------------------------------
|
| Here is where you can find routes for style examples.
| These are routes for many different pages, layouts,
| and other examples. Now create something great!
|
*/

// examples and docs, delete for production

Route::get('/404-example', 'StyleExamplesController@example404')->name('404-example');

Route::get('/500-example', 'StyleExamplesController@example500')->name('500-example');

Route::get('/blank-page', 'StyleExamplesController@blankPage')->name('blank-page');

Route::get('/buttons', 'StyleExamplesController@buttons')->name('buttons');

Route::get('/boxed', 'StyleExamplesController@boxed')->name('boxed');

Route::get('/calendar', 'StyleExamplesController@calendar')->name('calendar');

Route::get('/charts-js', 'StyleExamplesController@chartsJs')->name('charts-js');

Route::get('/collapsed-sidebar', 'StyleExamplesController@collapsedSidebar')->name('collapsed-sidebar');

Route::get('/documentation', 'StyleExamplesController@documentation')->name('documentation');

Route::get('/editors', 'StyleExamplesController@editors')->name('editors');

Route::get('/fixed', 'StyleExamplesController@fixed')->name('fixed');

Route::get('/flot', 'StyleExamplesController@flot')->name('flot');

Route::get('/forms', 'StyleExamplesController@formExamples')->name('forms');

Route::get('/forms-advanced', 'StyleExamplesController@formsAdvanced')->name('forms-advanced');

Route::get('/icons', 'StyleExamplesController@icons')->name('icons');

Route::get('/inline-charts', 'StyleExamplesController@inlineCharts')->name('inline-charts');

Route::get('/invoice', 'StyleExamplesController@invoice')->name('invoice');

Route::get('/lockscreen', 'StyleExamplesController@lockscreen')->name('lockscreen');

Route::get('/login-example', 'StyleExamplesController@loginExample')->name('login-example');

Route::get('/mailbox', 'StyleExamplesController@mailbox')->name('mailbox');

Route::get('/modals', 'StyleExamplesController@modals')->name('modals');

Route::get('/morris', 'StyleExamplesController@morris')->name('morris');

Route::get('/pace-page', 'StyleExamplesController@pacePage')->name('pace-page');

Route::get('/profile-example', 'StyleExamplesController@profileExample')->name('profile-example');

Route::get('/register-example', 'StyleExamplesController@registerExample')->name('register-example');

Route::get('/sliders', 'StyleExamplesController@sliders')->name('sliders');

Route::get('/tables-data', 'StyleExamplesController@tablesData')->name('tables-data');

Route::get('/tables-simple', 'StyleExamplesController@tablesSimple')->name('tables-simple');

Route::get('/timeline', 'StyleExamplesController@timeline')->name('timeline');

Route::get('/top-nav', 'StyleExamplesController@topNav')->name('top-nav');

Route::get('/ui-general', 'StyleExamplesController@uiGeneral')->name('ui-general');

Route::get('/widgets-examples', 'StyleExamplesController@widgets')->name('widgets');

