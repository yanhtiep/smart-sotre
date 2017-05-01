<?php

Route::group(array('as' => 'api.', 'prefix' => 'api', 'module' => 'RESTfulAPI\Advertise',  'namespace' => 'App\Modules\RESTfulAPI\Setups\Controllers', 'middleware' => 'web'), function() {

    Route::resource('RESTfulAPI/Setups', 'RESTfulAPI/SetupsController');
    
});	