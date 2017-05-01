<?php

Route::group(array('as' => 'api.foods.', 'module' => 'RESTfulAPI/Foods', 'namespace' => 'App\Modules\RESTfulAPI\Foods\Controllers'), function(){

    Route::post('api/foods/add', ['as' => 'add', 'uses' => 'FoodsController@add']);


    
});	