<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Shipping',  'namespace' => 'App\Modules\BackEnd\Shipping\Controllers', 'middleware' => ['web','admin']), function() {

    Route::get('shipping', ['as' => 'shipping', 'uses' => 'ShippingController@index']);
    
});	