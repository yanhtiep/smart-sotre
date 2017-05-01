<?php

Route::group(array('as' => 'api.', 'prefix' => 'api', 'module' => 'RESTfulAPI\Shipping',  'namespace' => 'App\Modules\RESTfulAPI\Shipping\Controllers', 'middleware' => 'web'), function() {

     Route::post('shipping', ['as' => 'admin.shipping', 'uses' => 'ShippingController@getAllShippingWithLimitOffset']);
    
});	

