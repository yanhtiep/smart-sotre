<?php

Route::group(array('as' => 'api.', 'prefix' => 'api', 'module' => 'RESTfulAPI\Advertise',  'namespace' => 'App\Modules\RESTfulAPI\Countries\Controllers', 'middleware' => 'web'), function() {
	

    Route::post('country', ['as' => 'country', 'uses' => 'CountriesController@index']);
    
});	