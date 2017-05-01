<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\BusinesTypes',  'namespace' => 'App\Modules\BackEnd\BusinesTypes\Controllers', 'middleware' => ['web','admin']), function() {
	

    Route::get('businestypes', ['as' => 'businestypes', 'uses' => 'BusinesTypesController@index']);
    
});	