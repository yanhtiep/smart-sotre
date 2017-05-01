<?php

Route::group(array('as' => 'admin.', 'module' => 'BackEnd\Products', 'namespace' => 'App\Modules\BackEnd\Products\Controllers', 'middleware' => ['web','admin']), function(){
    Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);

});
