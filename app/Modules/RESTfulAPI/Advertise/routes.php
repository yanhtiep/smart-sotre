<?php

Route::group(array('as' => 'api.', 'prefix' => 'api', 'module' => 'RESTfulAPI\Advertise',  'namespace' => 'App\Modules\RESTfulAPI\Advertise\Controllers', 'middleware' => 'web'), function() {
	

    //Route::resource('RESTfulAPI\Advertise', 'RESTfulAPI\AdvertiseController');

    Route::post('addAdvertise', ['as' => 'add.advertise', 'uses' => 'AdvertiseController@store']);

     Route::post('getAllAdvertises', ['as' => 'getAllAdvertises', 'uses' => 'AdvertiseController@getAllAdvertises']);

     Route::post('advertises', ['as' => 'advertises', 'uses' => 'AdvertiseController@getAllAddvertisesWithLimitOffset']);


     Route::post('deleteAdvertise', ['as' => 'delete.advertise', 'uses' => 'AdvertiseController@delete']);

     Route::post('editAdvertise', ['as' => 'edit.advertise', 'uses' => 'AdvertiseController@edit']);


    
});	


