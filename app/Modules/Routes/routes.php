<?php

Route::group(array('module' => 'Routes', 'namespace' => 'App\Modules\Routes\Controllers'), function() {

    Route::resource('routes', 'RoutesController');
    
});	