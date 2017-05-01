<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Profile',  'namespace' => 'App\Modules\BackEnd\Profile\Controllers', 'middleware' => ['web','admin']), function() {

  Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);
  
  Route::get('profileForm/{id?}', ['as' => 'showForm', 'uses' => 'ProfileController@formEdit']);
  
    
});	


Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Profile',  'namespace' => 'App\Modules\BackEnd\Profile\Controllers', 'middleware' => ['web','admin']), function() {
  
  Route::get('lock', ['as' => 'lock', 'uses' => 'LockController@index']);
    
}); 