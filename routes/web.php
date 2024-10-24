<?php

use App\Http\Controllers\Product\VariantController;

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
            Route::group(['prefix' => 'imageRepository'], function () {
                Route::get('', 'Product\ImageProductControllers@index')->name('indexProductImage');
                Route::get('getIndex', 'Product\ImageProductControllers@getIndex')->name('getIndexProductImage');
                Route::get('create', 'Product\ImageProductControllers@create')->name('createProductImage');
                Route::post('store', 'Product\ImageProductControllers@store')->name('storeProductImage');
                Route::get('edit/{id}', 'Product\ImageProductControllers@edit')->name('editProductImage');
                Route::put('update/{id}', 'Product\ImageProductControllers@update')->name('updateProductImage');
                Route::get('countByProductId/{productVariantId}', 'Product\ImageProductControllers@countByProductId')->name('countByProductId');
                Route::get('delete/{id}', 'Product\ImageProductControllers@delete')->name('deleteProductImage');
                Route::get('show/{id}', 'Product\ImageProductControllers@show')->name('showProductImage');
            });

            Route::group(['prefix' => 'attributeValues'], function () {
                Route::get('', 'Product\AttributeValuesControllers@index')->name('indexAttributeValues');
                Route::get('getIndex', 'Product\AttributeValuesControllers@getIndex')->name('getIndexAttributeValues');
                Route::get('create', 'Product\AttributeValuesControllers@create')->name('createAttributeValues');
                Route::post('store', 'Product\AttributeValuesControllers@store')->name('storeAttributeValues');
                Route::get('edit/{id}', 'Product\AttributeValuesControllers@edit')->name('editAttributeValues');
                Route::put('update/{id}', 'Product\AttributeValuesControllers@update')->name('updateAttributeValues');
                Route::get('delete/{id}', 'Product\AttributeValuesControllers@delete')->name('deleteAttributeValues');
            });
        });
    });
});
