<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'as' => 'admin' . '.', 'middleware'=>['auth','2fa']], function () {

    Route::get('/', 'DashboardController@index')->name('dash');

    Route::resource('/roles', 'RolesController');
    Route::resource('/permissions', 'PermissionsController');


    Route::resource('users', 'UserController');

    Route::resource('posts', 'PostsController');


    Route::get('/csv-import', 'ImportController@importForm')->name('csv');
    Route::post('/csv-import', 'ImportController@ImportCSV')->name('csv');

});

Route::group(['middleware'=>['auth']], function () {

    Route::get('/step-two-factor-auth', 'DashboardController@twoFactorForm')->name('two-factor-auth');
    Route::post('/step-two-factor-auth', 'DashboardController@verifyTwoFactorAuth')->name('two-factor-auth');

});

Route::get('/', function () {
    return view('welcome');
});
