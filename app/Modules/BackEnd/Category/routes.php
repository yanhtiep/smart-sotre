<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Category',  'namespace' => 'App\Modules\BackEnd\Category\Controllers', 'middleware' => ['web','admin']), function() {

    
    Route::get('category', ['as' => 'category', 'uses' => 'CategoryController@index']);
    Route::get('category/edit/{id}', ['as' => 'category-edit', 'uses' => 'CategoryController@getEdit']);
    Route::get('category/delete/{id}', ['as' => 'category-delete', 'uses' => 'CategoryController@getDelete']);
   	
});