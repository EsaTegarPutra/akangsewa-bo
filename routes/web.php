<?php


Route::get('/', function () {
    return redirect(url('login'));
});
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('postLogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'Dashboard\DashboardController@dashboard')->name('dashboard');


Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth']], function () {

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
        Route::group(['prefix' => 'product'], function () {
            Route::group(['prefix' => 'master'], function () {
                Route::get('', 'Product\ProductControllers@index')->name('indexProduct');
                Route::get('getIndex', 'Product\ProductControllers@getIndex')->name('getIndexProduct');
                Route::get('create', 'Product\ProductControllers@create')->name('createProduct');
                Route::post('store', 'Product\ProductControllers@store')->name('storeProduct');
                Route::get('edit/{id}', 'Product\ProductControllers@edit')->name('editProduct');
                Route::post('update/{id}', 'Product\ProductControllers@update')->name('updateProduct');
                Route::get('delete/{id}', 'Product\ProductControllers@delete')->name('deleteProduct');
            });
            Route::group(['prefix' => 'description'], function () {
                Route::get('', 'Product\DescriptionControllers@index')->name('indexDescription');
                Route::get('getIndex', 'Product\DescriptionControllers@getIndex')->name('getIndexDescription');
                Route::get('create', 'Product\DescriptionControllers@create')->name('createDescription');
                Route::post('store', 'Product\DescriptionControllers@store')->name('storeDescription');
                Route::get('edit/{id}', 'Product\DescriptionControllers@edit')->name('editDescription');
                Route::post('update/{id}', 'Product\DescriptionControllers@update')->name('updateDescription');
                Route::get('delete/{id}', 'Product\DescriptionControllers@delete')->name('deleteDescription');
            });
            Route::group(['prefix' => 'attribute'], function () {
                Route::get('', 'Product\AttributeControllers@index')->name('indexAttribute');
                Route::get('getIndex', 'Product\AttributeControllers@getIndex')->name('getIndexAttribute');
                Route::get('create', 'Product\AttributeControllers@create')->name('createAttribute');
                Route::post('store', 'Product\AttributeControllers@store')->name('storeAttribute');
                Route::get('edit/{id}', 'Product\AttributeControllers@edit')->name('editAttribute');
                Route::post('update/{id}', 'Product\AttributeControllers@update')->name('updateAttribute');
                Route::get('delete/{id}', 'Product\AttributeControllers@delete')->name('deleteAttribute');
            });
        });
    });
});
