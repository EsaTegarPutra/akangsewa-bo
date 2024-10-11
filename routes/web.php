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

        Route::group(['prefix' => 'masterData'], function () {

          Route::group(['prefix' => 'category'], function () {
            Route::get('', 'Category\CategoryControllers@index')->name('indexCategory');
            Route::get('getIndex', 'Category\CategoryControllers@getIndex')->name('getIndexCategory');
            Route::get('create', 'Category\CategoryControllers@create')->name('createCategory');
            Route::post('store', 'Category\CategoryControllers@store')->name('storeCategory');
            Route::get('edit/{id}', 'Category\CategoryControllers@edit')->name('editCategory');
            Route::post('update/{id}', 'Category\CategoryControllers@update')->name('updateCategory');
            Route::get('delete/{id}', 'Category\CategoryControllers@delete')->name('deleteCategory');
        });

    });
});
});
