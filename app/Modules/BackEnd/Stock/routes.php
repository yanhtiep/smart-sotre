<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Stock',  'namespace' => 'App\Modules\BackEnd\Stock\Controllers', 'middleware' => ['web','admin']), function() {

    
    Route::get('stock', ['as' => 'stock', 'uses' => 'StockController@index']);
    Route::get('stock/edit/{id}', ['as' => 'stock-edit', 'uses' => 'StockController@getEdit']);
    Route::get('stock/delete/{id}', ['as' => 'stock-delete', 'uses' => 'StockController@getDelete']);
   	Route::get('delimg',['as'=>'getDelImg','uses'=>'StockController@getDelImg']);
   	
});