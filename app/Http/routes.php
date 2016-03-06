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


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	
]);




/*Route::get('foo', function () {
    return 'Hello World';
});*/

//Route::get('article/{id}',['as' => 'art', 'ArticlesController@carrito']);

/*Route::get('users/{name?}', function ($name = null) {
    return $name;
});*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Route::resource('article', 'ArticlesController');
Route::get('article/{name}', ['as' => 'article', 'uses' => 'ArticlesController@show']);
Route::post('article', ['as' => 'article.cart', 'uses' => 'ArticlesController@cart']);

Route::get('product', ['as' => 'product', 'uses' => 'ProductsController@show']);

Route::get('service', ['as' => 'service', 'uses' => 'ServicesController@show']);

Route::resource('contact', 'ContactsController');
Route::get('contact', ['as' => 'contact', 'uses' => 'ContactsController@show']);

Route::get('faq', ['as' => 'faq', 'uses' => 'FaqsController@show']);

Route::resource('cart', 'CartsController');
Route::get('cart', ['as' => 'cart', 'uses' => 'CartsController@show']);

Route::resource('user', 'UserController');
Route::get('registerUser', ['as' => 'registerUser', 'uses' => 'UserController@register']);

/*
 + Rutas de las ventas
*/

Route::resource('sell', 'SellsController');






