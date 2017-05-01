<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Users',  'namespace' => 'App\Modules\BackEnd\Users\Controllers', 'middleware' => ['web','admin','auth']), function() {

    Route::get('user', ['as' => 'user', 'uses' => 'UsersController@index']);

});