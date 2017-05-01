<?php

Route::group(array('as' => 'api.', 'prefix' => 'api', 'module' => 'RESTfulAPI\BusineTypes',  'namespace' => 'App\Modules\RESTfulAPI\BusineTypes\Controllers', 'middleware' => 'web'), function() {

     Route::post('businetypes', ['as' => 'businetypes', 'uses' => 'BusineTypesController@getAllABusinesstisesWithLimitOffset']);
    
});	