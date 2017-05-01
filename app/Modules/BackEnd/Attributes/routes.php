<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin','module' => 'BackEnd\Attributes', 'namespace' => 'App\Modules\BackEnd\Attributes\Controllers','middleware' => ['web','admin']), function() {

    Route::get('attributes', ['as' => 'attributes', 'uses' => 'AttributesController@index']);
    
});	
