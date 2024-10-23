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

         Route::group(['prefix' => 'product'],function () {
            Route::group(['prefix' => 'variant'],function () {
                Route::get('', 'Variant\VariantControllers@index')->name('indexVariant');
                Route::get('getIndex', 'Variant\VariantControllers@getIndex')->name('getIndexVariant');
                Route::get('create', 'Variant\VariantControllers@create')->name('createVariant');
                Route::post('store', 'Variant\VariantControllers@store')->name('storeVariant');
                Route::get('edit/{id}', 'Variant\VariantControllers@edit')->name('editVariant');
                Route::post('update/{id}', 'Variant\VariantControllers@update')->name('updateVariant');
                Route::get('delete/{id}', 'Variant\VariantControllers@delete')->name('deleteVariant');
            });
        });


        Route::group(['prefix' => 'product'], function () {
            Route::group(['prefix' => 'attribute'], function () {
                Route::get('', 'Attribute\AttributeControllers@index')->name('indexAttribute');
                Route::get('getIndex', 'Attribute\AttributeControllers@getIndex')->name('getIndexAttribute');
                Route::get('create', 'Attribute\AttributeControllers@create')->name('createAttribute');
                Route::post('store', 'Attribute\AttributeControllers@store')->name('storeAttribute');
                Route::get('edit/{id}', 'Attribute\AttributeControllers@edit')->name('editAttribute');
                Route::post('update/{id}', 'Attribute\AttributeControllers@update')->name('updateAttribute');
                Route::get('delete/{id}', 'Attribute\AttributeControllers@delete')->name('deleteAttribute');
            });
        });

        // Route::group(['prefix' => 'product'], function () {
        //     Route::group(['prefix' => 'value'], function () {
        //         Route::get('', 'Value\ValueControllers@index')->name('indexValue');
        //         Route::get('getIndex', 'Value\ValueControllers@getIndex')->name('getIndexValue');
        //         Route::get('create', 'Value\ValueControllers@create')->name('createValue');
        //         Route::post('store', 'Value\ValueControllers@store')->name('storeValue');
        //         Route::get('edit/{id}', 'Value\ValueController@edit')->name('editValue');
        //         Route::post('update/{id}', 'Value\ValueController@update')->name('updateValue');
        //         Route::get('delete/{id}', 'Value\ValueController@delete')->name('deleteValue');
        //     });
        // });
    });
});
