<?php

Route::group(array('as' => 'api.', 'prefix' => 'api', 'module' => 'RESTfulAPI\Stock',  'namespace' => 'App\Modules\RESTfulAPI\Stock\Controllers', 'middleware' => 'web'), function() {
    
	//category for add and edit 
	// Route::post('refreshCategories', ['as' => 'refreshCategories', 'uses' => 'CategoryController@pullToRefresh']);
    Route::post('addStock', ['as' => 'add.stock', 'uses' => 'StockController@store']);
    Route::patch('editStock/{id}', ['as' => 'edit.stock', 'uses' => 'StockController@update']);
    //Route::post('deleteCategory/{id}', ['as' => 'delete.category', 'uses' => 'CategoryController@delete']);
    //  Route::post('categoryById', ['as' => 'get.categoryById', 'uses' => 'categoryController@categoryById']);
    //  Route::post('getAllCategories', ['as' => 'get.getAllCategories', 'uses' => 'categoryController@getAllCategories']);
  
});