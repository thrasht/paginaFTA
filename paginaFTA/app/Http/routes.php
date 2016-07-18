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
Route::get('article/{type}/agregar', ['as' => 'article.create', 'uses' => 'ArticlesController@create']);
Route::post('article', ['as' => 'article.store', 'uses' => 'ArticlesController@store']);
Route::get('article/{id}/edit', ['as' => 'article.edit', 'uses' => 'ArticlesController@edit']);
Route::put('article/{id}', ['as' => 'article.update', 'uses' => 'ArticlesController@update']);
Route::delete('article/{id}', ['as' => 'article.destroy', 'uses' => 'ArticlesController@destroy']);

Route::get('product', ['as' => 'product', 'uses' => 'ProductsController@show']);

Route::get('service', ['as' => 'service', 'uses' => 'ServicesController@show']);

/*
 + Rutas del contacto
*/
Route::get('contact', ['as' => 'contact', 'uses' => 'ContactsController@show']);
Route::post('contact', ['as' => 'contact.store', 'uses' => 'ContactsController@store']);
Route::get('contact/{id}', ['as' => 'contact.open', 'uses' => 'ContactsController@open']);
Route::put('contact/{id}', ['as' => 'contact.reply', 'uses' => 'ContactsController@reply']);

/*
 + Rutas de las preguntas frecuentes
*/
Route::get('faq', ['as' => 'faq', 'uses' => 'FaqsController@show']);
Route::get('faq/create', ['as' => 'faq.create', 'uses' => 'FaqsController@create']);
Route::post('faq', ['as' => 'faq.store', 'uses' => 'FaqsController@store']);
Route::get('faq/{id}/edit', ['as' => 'faq.edit', 'uses' => 'FaqsController@edit']);
Route::put('faq/{id}', ['as' => 'faq.update', 'uses' => 'FaqsController@update']);
Route::delete('faq/{id}', ['as' => 'faq.destroy', 'uses' => 'FaqsController@destroy']);


Route::resource('cart', 'CartsController');
Route::get('cart', ['as' => 'cart', 'uses' => 'CartsController@show']);

/*
 + Rutas del usuario
*/

Route::resource('user', 'UserController');
Route::get('registerUser', ['as' => 'registerUser', 'uses' => 'UserController@register']);
Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
Route::put('profile/edit', ['as' => 'profile.edit', 'uses' => 'UserController@userUpdate']);
Route::get('profile/address', ['as' => 'profile.address', 'uses' => 'UserController@address']);
Route::put('profile/address/{id}/edit', ['as' => 'profile.address.edit', 'uses' => 'UserController@editAddress']);

Route::get('profile/orders', ['as' => 'profile.orders', 'uses' => 'UserController@orders']);
Route::get('profile/orders/detail/{folio}', ['as' => 'profile.orders.detail', 'uses' => 'UserController@detail']);
Route::delete('profile/orders/detail/{id}', ['as' => 'orders.destroy', 'uses' => 'SellsController@userDestroy']);
Route::get('profile/orders/detail/{id}/editPayment', ['as' => 'orders.editPayment', 'uses' => 'SellsController@editPayment']);
Route::put('profile/orders/detail/{id}', ['as' => 'orders.uploadPayment', 'uses' => 'SellsController@uploadPayment']);

Route::get('/asdf', function(){ return view('asdf');});
/*
 + Rutas de las ventas
*/

Route::resource('sell', 'SellsController');
Route::get('orders', ['as' => 'orders.list', 'uses' => 'SellsController@orderList']);
Route::get('orders/{id}', ['as' => 'orders.detail', 'uses' => 'SellsController@orderDetail']);
Route::put('orders/{id}', ['as' => 'orders.aprove', 'uses' => 'SellsController@orderAprove']);
Route::put('orders/cancel/{id}', ['as' => 'orders.cancel', 'uses' => 'SellsController@orderCancel']);
Route::post('orders/shipping/{id}', ['as' => 'orders.shipping', 'uses' => 'SellsController@orderShipping']);
Route::post('orders/close/{id}', ['as' => 'orders.close', 'uses' => 'SellsController@closeOrder']);


/*
 + Rutas del banner
*/

Route::resource('banner', 'BannersController');
Route::post('banner/store', ['as' => 'banner.add', 'uses' => 'BannersController@store']);







