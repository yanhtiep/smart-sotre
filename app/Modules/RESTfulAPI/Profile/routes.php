<?php

Route::group(array('as' => 'api.profile.', 'module' => 'RESTfulAPI/Profile', 'namespace' => 'App\Modules\RESTfulAPI\Profile\Controllers'), function(){

  Route::post('api/profile/update', ['as' => 'update', 'uses' => 'ProfileController@update']);
  Route::post('api/profile/edit', ['as' => 'edit', 'uses' => 'ProfileController@edit']);
  Route::post('api/profile/sendEmail', ['as' => 'email', 'uses' => 'ProfileController@sendEmailReminder']);
 
});