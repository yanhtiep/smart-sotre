<?php

Route::group(array('as' => 'admin.Index.', 'module' => 'BackEnd/Index', 'namespace' => 'App\Modules\BackEnd\Index\Controllers', 'middleware' => ['web','admin']), function(){

	Route::get('admin', ['as' => 'admin', 'uses' => 'IndexController@index']);
	//Route::get('admin/category/{menuId?}/{pageId?}', ['as' => 'category', 'uses' => 'IndexController@categoryPage']);

});