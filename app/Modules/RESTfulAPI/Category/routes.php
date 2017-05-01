<?php

Route::group(array('as' => 'api.', 'prefix' => 'api', 'module' => 'RESTfulAPI\Category',  'namespace' => 'App\Modules\RESTfulAPI\Category\Controllers', 'middleware' => 'web'), function() {
    
	//category for add and edit 
	// Route::post('refreshCategories', ['as' => 'refreshCategories', 'uses' => 'CategoryController@pullToRefresh']);
    Route::post('addCategory', ['as' => 'add.category', 'uses' => 'CategoryController@store']);
    Route::patch('editCategory/{id}', ['as' => 'edit.category', 'uses' => 'CategoryController@update']);
    //Route::post('deleteCategory/{id}', ['as' => 'delete.category', 'uses' => 'CategoryController@delete']);
    //oute::post('categoryById', ['as' => 'get.categoryById', 'uses' => 'categoryController@categoryById']);
    //Route::post('getAllCategories', ['as' => 'get.getAllCategories', 'uses' => 'categoryController@getAllCategories']);
    

});