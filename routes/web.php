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

// Auth Routes
Auth::routes();

// Basic Routes
//Route::get('/home', 'HomeController@index');

// Protected Routes
Route::group(['middleware' => 'auth'], function () {

//    Route::get('/', function () {
//        return redirect('users');
//    });

    Route::get('/', 'HomeController@index');

    Route::get('users', 'UserController@getUserList');
    Route::get('sensors', 'SensorController@getSensorList');
    Route::get('sensors/new', 'SensorController@newSensor');
    Route::get('sensors/{id}', 'SensorController@show');
});

// Console Routes
Route::group(['prefix' => 'console', 'middleware' => 'auth', 'namespace' => 'Console'], function () {

    Route::get('/', 'ConsoleController@getConsoleHome');
    Route::get('oauth', 'ConsoleController@getOauth');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

  /*  Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@getUserList');
    });
  */
});

// Image Routes
// @WARNING: The 'image' prefix is reserved for SomelineImageService
Route::group(['prefix' => 'image'], function () {

    Route::post('/', 'ImageController@postImage');

    Route::get('/{name}', 'ImageController@showOriginalImage');

});

// Locale Routes
// @WARNING: The 'locales' prefix is reserved for SomelineLocaleController
Route::group(['prefix' => 'locales'], function () {

    Route::get('/{locale}.js', '\Someline\Support\Controllers\LocaleController@getLocaleJs');

    Route::get('/switch/{locale}', '\Someline\Support\Controllers\LocaleController@getSwitchLocale');

});
