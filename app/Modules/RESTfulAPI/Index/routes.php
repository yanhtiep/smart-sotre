<?php

Route::group(array('module' => 'RESTfulAPI\Index', 'namespace' => 'App\Modules\RESTfulAPI\Index\Controllers'), function() {

    Route::resource('RESTfulAPI\Index', 'RESTfulAPI\IndexController');
    
});	