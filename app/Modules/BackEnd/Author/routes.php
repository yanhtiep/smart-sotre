<?php

Route::group(array('as' => 'admin.', 'prefix' => 'admin', 'module' => 'BackEnd\Author',  'namespace' => 'App\Modules\BackEnd\Author\Controllers', 'middleware' => 'web'), function() {

    Route::get('login', ['as' => 'login', 'uses' => 'AuthorController@login']);
    Route::post('login', ['as' => 'login', 'uses' => 'AuthorController@login']);
    Route::get('register', ['as' => 'register', 'uses' => 'AuthorController@register']);
    Route::post('register', ['as' => 'register', 'uses' => 'AuthorController@create']);
    Route::get('reset-password', ['as' => 'reset-password', 'uses' => 'AuthorController@resetPassword']);
    Route::post('reset-password', ['as' => 'reset-password', 'uses' => 'AuthorController@resetPassword']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthorController@logout']);
    Route::get('redirect', ['as' => 'redirect', 'uses' => 'AuthorController@redirect']);
    Route::get('callback', ['as' => 'callback', 'uses' => 'AuthorController@callback']);
    Route::post('sendEmail', ['as' => 'sendEmail', 'uses' => 'AuthorController@sendEmailReminder']);
    Route::get('confirm', ['as' => 'confirm', 'uses' => 'AuthorController@confirmCode']);
    Route::get('change', ['as' => 'change', 'uses' => 'AuthorController@changePassword']);

});


/*
 *route twitter  login
 *
 */

Route::group(array('as' => 'autho.twitter.', 'prefix' => 'autho', 'module' => 'BackEnd\Author',  'namespace' => 'App\Modules\BackEnd\Author\Controllers', 'middleware' => 'web'), function() {

    Route::get('redirect', ['as' => 'redirect', 'uses' => 'TwitterController@redirectToProvider']);
    Route::get('callback', ['as' => 'callback', 'uses' => 'TwitterController@handleProviderCallback']);
});

/*
 *route G+  login
 *
 */

Route::group(array('as' => 'autho.google.', 'prefix' => 'autho', 'module' => 'BackEnd\Author',  'namespace' => 'App\Modules\BackEnd\Author\Controllers', 'middleware' => 'web'), function() {

    Route::get('redirect/google', ['as' => 'redirect', 'uses' => 'GoogleController@redirectToProvider']);
    Route::get('callback/google', ['as' => 'callback', 'uses' => 'GoogleController@handleProviderCallback']);
});

/*
 *route linkedin  login
 *
 */

Route::group(array('as' => 'autho.linkedin.', 'prefix' => 'autho', 'module' => 'BackEnd\Author',  'namespace' => 'App\Modules\BackEnd\Author\Controllers', 'middleware' => 'web'), function() {

    Route::get('redirect/linkedin', ['as' => 'redirect', 'uses' => 'LinkedinController@redirectToProvider']);
    Route::get('callback/linkedin', ['as' => 'callback', 'uses' => 'LinkedinController@handleProviderCallback']);
});