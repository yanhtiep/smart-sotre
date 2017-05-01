<?php

	Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Foods',  'namespace' => 'App\Modules\BackEnd\Foods\Controllers', 'middleware' => ['web','admin']), function() {

   	 	Route::get('foods', ['as' => 'foods', 'uses' => 'FoodsController@index']);

    	Route::get('creatfood', ['as' => 'creatfood', 'uses' => 'FoodsController@create']);
    

});
