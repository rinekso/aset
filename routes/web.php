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
        Route::get('/inputBarang', 'SubUnitController@inputBarang');
        Route::get('/formInputBarang/{id}', 'SubUnitController@formInputBarang')->name('.formInputBarang');
        Route::post('/storeBarang', 'SubUnitController@storeBarang');
    });

	/**
     * Route untuk unit
     */
    Route::group(['middleware' => 'unit', 'prefix' => 'unit', 'as' => 'unit'], function()
    {
    	Route::get('/home', 'UnitController@index');
		Route::get('/', 'UnitController@index');
        Route::get('/list-kegiatan', 'UnitController@listKegiatan');
        Route::get('/data-kegiatan', 'UnitController@dataKegiatan');
        Route::get('/kegiatan/{id}', 'UnitController@kegiatanPengadaan');
        Route::get('/data-pengadaan/{id}', 'UnitController@dataPengadaan');
        Route::get('/approve/{id}', 'UnitController@approve')->name('.approve');
        Route::get('/tolak/{id}', 'UnitController@tolak')->name('.tolak');
        // Route::get('/getData', 'UnitController@getDataPengadaan');
    });    

    /**
     * Route untuk bidang
     */
    Route::group(['middleware' => 'bidang', 'prefix' => 'bidang', 'as' => 'bidang'], function() {
        Route::get('/home', 'BidangController@index');
        Route::get('/', 'BidangController@index'); 
        Route::get('/list-kegiatan', 'BidangController@listKegiatan');
        Route::get('/data-kegiatan', 'BidangController@dataKegiatan');
        Route::get('/kegiatan/{id}', 'BidangController@kegiatanPengadaan');
        Route::get('/data-pengadaan/{id}', 'BidangController@dataPengadaan');
        Route::get('/approve/{id}', 'BidangController@approve')->name('.approve');
        Route::get('/tolak/{id}', 'BidangController@tolak')->name('.tolak');
    });  
});






// Profile

Route::get('show-profile', 'ProfileController@showProfileToUser')->name('show-profile');

Route::get('determine-profile-route', 'ProfileController@determineProfileRoute')->name('determine-profile-route');

Route::resource('profile', 'ProfileController');

// Username route

Route::get('/username', 'UsernameController@show')->middleware('auth');

// Settings routes

Route::get('settings', 'SettingsController@edit');

Route::post('settings', 'SettingsController@update')->name('user-update');

// Terms route

Route::get('/terms', 'PagesController@terms')->name('terms');

// User routes

Route::resource('user', 'UserController');


// Widget routes

Route::get('widget/create',  'WidgetController@create')->name('widget.create');

Route::get('widget/{widget}-{slug?}', 'WidgetController@show')->name('widget.show');

Route::resource('widget', 'WidgetController', ['except' => ['show', 'create']]);


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


