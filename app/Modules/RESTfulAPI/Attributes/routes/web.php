<?php

Route::group(array('module' => 'RESTfulAPI\Attributes', 'middleware' => ['web'], 'namespace' => 'App\Modules\RESTfulAPI\Attributes\Controllers'), function() {

    Route::resource('RESTfulAPI\Attributes', 'RESTfulAPI\AttributesController');
    
});	
