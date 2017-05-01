<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
define('ASSETS_PATH', Config::get('constants.assets.frontendTemplate'));

// Route::get('/', function () {
    // return view('index');
// });

Route::get('routes', function() {
     \Artisan::call('route:list');
     return \Artisan::output();
});


Route::get('/', 'HomeController@index');
Route::post('/search', 'HomeController@search');
Route::post('/getProByCate', 'HomeController@getProByCate');
Route::get('/item',['as' => 'item', 'uses' => 'HomeController@item']);
Route::get('/cart/addItemBrand/{id}', 'HomeController@addItemBrand');

Route::get('/user/login', 'UsersController@getlogin');
Route::post('/user/login', 'UsersController@postlogin');
Route::get('/user/logout', 'UsersController@getlogout');
Route::get('/user-info', 'UsersController@getuserinfo');
Route::post('/user-info', 'UsersController@postuserinfo');
Route::get('user/register', 'UsersController@getRegister');
Route::post('user/register', 'UsersController@postRegister');

Route::get('/stock-detail/{id}', 'DetailController@index');

Route::get('/stock-category-type/{id}', 'CategoryController@index');
Route::get('/item2',['as' => 'item2', 'uses' => 'CategoryController@item2']);
Route::get('/cart/addItemCate/{id}', 'CategoryController@addItemCate');

Route::get('/stock', 'StockController@index');

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@destroy');
Route::get('/cart/update/{id}/{qty}', 'CartController@update');

Route::get('/checkout', 'CheckoutController@index');
Route::post('/formvalidate','CheckoutController@formvalidate');
