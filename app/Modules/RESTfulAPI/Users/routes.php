<?php

Route::group(array('as' => 'api.users.', 'module' => 'RESTfulAPI/Users', 'namespace' => 'App\Modules\RESTfulAPI\Users\Controllers'), function(){

	Route::post('api/users/add', ['as' => 'add', 'uses' => 'UsersController@add']);
  Route::post('api/users/delete', ['as' => 'delete', 'uses' => 'UsersController@deleteUser']);
  Route::post('api/users/edit', ['as' => 'edit', 'uses' => 'UsersController@editUserRole']);
  Route::post('api/users/update', ['as' => 'update', 'uses' => 'UsersController@updateUserRole']);
  Route::post('api/users/comfirmCode', ['as' => 'comfirmCode', 'uses' => 'UsersController@comfirmCode']);
  Route::post('api/users/changePass', ['as' => 'changePass', 'uses' => 'UsersController@changePassword']);
  Route::post('api/users/getUserLimit', ['as' => 'getUserLimit', 'uses' => 'UsersController@getUserWithLimitOffset']);
  Route::post('api/users/pullToRefresh', ['as' => 'pullToRefresh', 'uses' => 'UsersController@pullToRefresh']);

  Route::post('api/users/register', ['as' => 'register', 'uses' => 'UsersController@register']);
  Route::post('api/users/getprofileuser', ['as' => 'getprofileuser', 'uses' => 'UsersController@getprofileuser']);
  Route::post('api/users/getUserWithLimitOffsetUpdate', ['as' => 'getUserWithLimitOffsetUpdate', 'uses' => 'UsersController@getUserWithLimitOffsetUpdate']);

});
