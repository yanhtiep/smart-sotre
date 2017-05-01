<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Advertise',  'namespace' => 'App\Modules\BackEnd\Setups\Controllers', 'middleware' => 'web'), function() {

    Route::get('setup', ['as' => 'setup', 'uses' => 'SetupsController@index']);
    
});	