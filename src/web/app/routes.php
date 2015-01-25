<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::post('/user/auth', ['prefix' => 'api/v1', 'uses' => 'Api\UserController@auth']);
Route::group(['prefix' => 'api/v1', 'namespace' => 'Api'], function()
{
	Route::resource('user', 'UserController', ['only' => ['store']]);
	Route::resource('list', 'ListController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
	Route::resource('list.product', 'ProductController', ['only' => ['store', 'update', 'destroy']]);
	Route::resource('product', 'ProductController', ['only' => ['index']]);
});

Route::resource('list', 'ListController');
