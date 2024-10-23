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

            Route::group(['prefix' => 'variant'], function () {
                Route::get('', 'Product\VariantControllers@index')->name('indexVariant');
                Route::get('getIndex', 'Product\VariantControllers@getIndex')->name('getIndexVariant');
                Route::get('create', 'Product\VariantControllers@create')->name('createVariant');
                Route::post('store', 'Product\VariantControllers@store')->name('storeVariant');
                Route::get('edit/{id}', 'Product\VariantControllers@edit')->name('editVariant');
                Route::post('update/{id}', 'Product\VariantControllers@update')->name('updateVariant');
                Route::get('delete/{id}', 'Product\VariantControllers@delete')->name('deleteVariant');
            });

            Route::group(['prefix' => 'imageRepository'], function () {
                Route::get('', 'Product\ImageProductControllers@index')->name('indexProductImage');
                Route::get('getIndex', 'Product\ImageProductControllers@getIndex')->name('getIndexProductImage');
                Route::get('create', 'Product\ImageProductControllers@create')->name('createProductImage');
                Route::post('store', 'Product\ImageProductControllers@store')->name('storeProductImage');
                Route::get('edit/{id}', 'Product\ImageProductControllers@edit')->name('editProductImage');
                Route::put('update/{id}', 'Product\ImageProductControllers@update')->name('updateProductImage');
                Route::get('delete/{id}', 'Product\ImageProductControllers@delete')->name('deleteProductImage');
            });

        });


        // === NOT USE ===
        // Route::group(['prefix' => 'product'], function () {
        //     Route::group(['prefix' => 'attribute'], function () {
        //         Route::get('', 'Attribute\AttributeControllers@index')->name('indexAttribute');
        //         Route::get('getIndex', 'Attribute\AttributeControllers@getIndex')->name('getIndexAttribute');
        //         Route::get('create', 'Attribute\AttributeControllers@create')->name('createAttribute');
        //         Route::post('store', 'Attribute\AttributeControllers@store')->name('storeAttribute');
        //         Route::get('edit/{id}', 'Attribute\AttributeControllers@edit')->name('editAttribute');
        //         Route::post('update/{id}', 'Attribute\AttributeControllers@update')->name('updateAttribute');
        //         Route::get('delete/{id}', 'Attribute\AttributeControllers@delete')->name('deleteAttribute');
        //     });
        // });

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
        //=== NOT USE ==
    });
});
