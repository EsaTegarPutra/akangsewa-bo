<?php

use App\Http\Controllers\Product\VariantController;
use Illuminate\Routing\RouteGroup;

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
                Route::get('checkProduct/{id}', 'Category\CategoryControllers@checkProduct')->name('checkProductCategory');
            });


            Route::group(['prefix' => 'banner'],  function () {
                Route::get('', 'Banner\BannerControllers@index')->name('indexBanner');
                Route::get('getIndex', 'Banner\BannerControllers@getIndex')->name('getIndex');
                Route::get('create', 'Banner\BannerControllers@create')->name('createBanner');
                Route::post('store', 'Banner\BannerControllers@store')->name('storeBanner');
                Route::get('edit/{id}', 'Banner\BannerControllers@edit')->name('editBanner');
                Route::put('update/{id}', 'Banner\BannerControllers@update')->name('updateBanner');
                Route::get('delete/{id}', 'Banner\BannerControllers@delete')->name('deleteBanner');
            });
            Route::group(['prefix' => 'tenantShipping'], function() {
                Route::get('', 'TenantShipping\TenantShippingControllers@index')->name('indexTenantShipping');
                Route::get('getIndex', 'TenantShipping\TenantShippingControllers@getIndex')->name('getIndexTenantShipping');
                Route::get('create', 'TenantShipping\TenantShippingControllers@create')->name('createTenantShipping');
                Route::post('store', 'TenantShipping\TenantShippingControllers@store')->name('storeTenantShipping');
                Route::get('edit/{id}', 'TenantShipping\TenantShippingControllers@edit')->name('editTenantShipping');
                Route::post('update/{id}', 'TenantShipping\TenantShippingControllers@update')->name('updateTenantShipping');
                Route::get('delete/{id}', 'TenantShipping\TenantShippingControllers@delete')->name('deleteTenantShipping');
            });
            Route::group(['prefix' => 'kurir'], function () {
                Route::get('', 'Kurir\KurirControllers@index')->name('indexKurir');
                Route::get('getIndex', 'Kurir\KurirControllers@getIndex')->name('getIndexKurir');
                Route::get('create', 'Kurir\KurirControllers@create')->name('createKurir');
                Route::post('store', 'Kurir\KurirControllers@store')->name('storeKurir');
                Route::get('edit/{id}', 'Kurir\KurirControllers@edit')->name('editKurir');
                Route::put('update/{id}', 'Kurir\KurirControllers@update')->name('updateKurir');
                Route::get('delete/{id}', 'Kurir\KurirControllers@delete')->name('deleteKurir');
            });

            Route::group(['prefix' => 'scrapData'], function () {
                Route::get('', 'Scrap\ScrapController@index')->name('indexScrap');
                Route::get('getIndex', 'Scrap\ScrapController@getIndex')->name('getIndexScrap');
                Route::get('details/{id}', 'Scrap\ScrapController@details')->name('detailScrap');
                Route::get('getByType/{type}', 'Scrap\ScrapController@getByType')->name('getByTypeScrap');
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
                Route::get('checkProductDescription/{id}', 'Product\ProductControllers@checkProductDescription')->name('checkProductDescription');
                Route::get('checkProductVariant/{id}', 'Product\ProductControllers@checkProductVariant')->name('checkProductVariant');
            });

            Route::group(['prefix' => 'description'], function () {
                Route::get('', 'Product\ProductDescription\DescriptionControllers@index')->name('indexDescription');
                Route::get('getIndex', 'Product\ProductDescription\DescriptionControllers@getIndex')->name('getIndexDescription');
                Route::get('create', 'Product\ProductDescription\DescriptionControllers@create')->name('createDescription');
                Route::post('store', 'Product\ProductDescription\DescriptionControllers@store')->name('storeDescription');
                Route::get('edit/{id}', 'Product\ProductDescription\DescriptionControllers@edit')->name('editDescription');
                Route::post('update/{id}', 'Product\ProductDescription\DescriptionControllers@update')->name('updateDescription');
                Route::get('delete/{id}', 'Product\ProductDescription\DescriptionControllers@delete')->name('deleteDescription');
            });

            Route::group(['prefix' => 'attribute'], function () {
                Route::get('', 'Attribute\AttributeControllers@index')->name('indexAttribute');
                Route::get('getIndex', 'Attribute\AttributeControllers@getIndex')->name('getIndexAttribute');
                Route::get('create', 'Attribute\AttributeControllers@create')->name('createAttribute');
                Route::post('store', 'Attribute\AttributeControllers@store')->name('storeAttribute');
                Route::get('edit/{id}', 'Attribute\AttributeControllers@edit')->name('editAttribute');
                Route::post('update/{id}', 'Attribute\AttributeControllers@update')->name('updateAttribute');
                Route::get('delete/{id}', 'Attribute\AttributeControllers@delete')->name('deleteAttribute');
            });

            Route::group(['prefix' => 'variant'], function () {
                Route::get('', 'Product\Variant\VariantControllers@index')->name('indexVariant');
                Route::get('getIndex', 'Product\Variant\VariantControllers@getIndex')->name('getIndexVariant');
                Route::get('create', 'Product\Variant\VariantControllers@create')->name('createVariant');
                Route::post('store', 'Product\Variant\VariantControllers@store')->name('storeVariant');
                Route::get('edit/{id}', 'Product\Variant\VariantControllers@edit')->name('editVariant');
                Route::post('update/{id}', 'Product\Variant\VariantControllers@update')->name('updateVariant');
                Route::get('delete/{id}', 'Product\Variant\VariantControllers@delete')->name('deleteVariant');
                Route::get('checkProductImage/{id}', 'Product\Variant\VariantControllers@checkProductImage')->name('checkProductImage');
            });

            Route::group(['prefix' => 'imageRepository'], function () {
                Route::get('', 'Product\Image\ImageProductControllers@index')->name('indexProductImage');
                Route::get('getIndex', 'Product\Image\ImageProductControllers@getIndex')->name('getIndexProductImage');
                Route::get('create', 'Product\Image\ImageProductControllers@create')->name('createProductImage');
                Route::post('store', 'Product\Image\ImageProductControllers@store')->name('storeProductImage');
                Route::get('edit/{id}', 'Product\Image\ImageProductControllers@edit')->name('editProductImage');
                Route::put('update/{id}', 'Product\Image\ImageProductControllers@update')->name('updateProductImage');
                Route::get('delete/{id}', 'Product\Image\ImageProductControllers@delete')->name('deleteProductImage');
            });
        });


        Route::group(['prefix' => 'order'], function () {
            Route::get('/detail-order/{id}', 'Order\OrderControllers@detailOrder')->name('detailOrder');
            Route::get('/getIndexOrderDetail', 'Order\OrderControllers@getIndexOrderDetail')->name('getIndexOrderDetail');
            Route::get('getIndex', 'Order\OrderControllers@getIndex')->name('getIndexOrder');
            
            Route::group(['prefix' => 'trackingDelivery'], function () {
                Route::get('/', 'Order\OrderControllers@trackingDelivery')->name('trackingDelivery');
                Route::get('/detail/{id}', 'Order\OrderControllers@trackingDeliveryDetail')->name('trackingDeliveryDetail');
            });

            Route::group(['prefix' => 'pendingOrder'], function () {
                Route::get('', 'Order\PendingOrder\PendingControllers@index')->name('indexPendingOrder');
                Route::get('getIndex', 'Order\PendingOrder\PendingControllers@getIndex')->name('getIndexPendingOrder');
                Route::get('create', 'Order\PendingOrder\PendingControllers@create')->name('createPendingOrder');
            });

            Route::group(['prefix' => 'detailPending'], function () {
                Route::get('', 'Order\DetailPending\DetailControllers@index')->name('indexDetailPending');
                Route::get('getIndex', 'Order\DetailPending\DetailControllers@getIndex')->name('getIndexDetailPending');
                // Route::get('create', 'Order\DetailPending\DetailControllers@create')->name('createDetailPending');
                // Route::post('store', 'Order\DetailPending\DetailControllers@store')->name('storeDetailPending');
                // Route::get('edit/{id}', 'Order\DetailPending\DetailControllers@edit')->name('editDetailPending');
                // Route::post('update/{id}', 'Order\DetailPending\DetailControllers@update')->name('updateDetailPending');
                // Route::get('delete/{id}', 'Order\DetailPending\DetailControllers@delete')->name('deleteDetailPending');
            });
            Route::group(['prefix' => 'ongoingRentals'], function () {
                Route::get('', 'Order\Progress\ProgressControllers@index')->name('indexOrderProgress');
                Route::get('getIndex', 'Order\Progress\ProgressControllers@getIndex')->name('getIndexProgressOrder');
            });

            Route::group(['prefix' => 'historyOrder'],  function () {
                Route::get('', 'Order\CompletedOrder\CompletedOrderControllers@index')->name('indexCompletedOrder');
                Route::get('getIndex', 'Order\CompletedOrder\CompletedOrderControllers@getIndex')->name('getIndexCompletedOrder');
                Route::get('detail', 'Order\CompletedOrder\CompletedOrderControllers@show')->name('showCompletedOrder');
            });
        });
    });
});
