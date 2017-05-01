<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Advertise',  'namespace' => 'App\Modules\BackEnd\Advertise\Controllers', 'middleware' => 'web'), function() {

   /* Route::resource('BackEnd\Advertise', 'BackEnd\AdvertiseController');*/

   /* Route::get('advertise', ['as' => 'advertise', 'uses' => 'AdvertiseController@index']);*/

    Route::get('advertise', ['as' => 'advertise', 'uses' => 'AdvertiseController@index']);
     Route::get('createadvertise', ['as' => 'createadvertise', 'uses' => 'AdvertiseController@create']);
    
});	

