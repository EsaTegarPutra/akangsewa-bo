<?php


Route::get('/', function () {
    return redirect(url('login'));
});
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('postLogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'Dashboard\DashboardController@dashboard')->name('dashboard');


Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth'] ], function () {

        Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboardIndex');
        Route::get('/test', 'Dashboard\DashboardController@test')->name('dashboardIndex');

    });
});
