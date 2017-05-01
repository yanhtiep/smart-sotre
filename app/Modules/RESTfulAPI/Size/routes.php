<?php

Route::group(array('module' => 'RESTfulAPI/Size', 'namespace' => 'App\Modules\RESTfulAPI\Size\Controllers'), function() {

    Route::resource('RESTfulAPI/Size', 'RESTfulAPI/SizeController');
    
});	