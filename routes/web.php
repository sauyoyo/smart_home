<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('sites.index');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
	Route::get('/', function()
	{
		return view('admin.master');
	})->name('dashboard');
	Route::resource('user', 'UserController');
	Route::get('/user/delete/{id}', 'UserController@destroy');
	Route::get('/search-user', 'UserController@search');
	
	Route::resource('post', 'PostController');
	Route::get('/post/delete/{id}', 'PostController@destroy');

	Route::resource('product', 'ProductController');
	Route::get('/product/delete/{id}', 'ProductController@destroy');

	Route::resource('media', 'MediaController');
	Route::get('/media/delete/{id}', 'MediaController@destroy');

	Route::resource('brand', 'BrandController');
	Route::get('/brand/delete/{id}', 'BrandController@destroy');

	Route::resource('feature','FeatureController');
	Route::get('/feature/delete/{id}', 'FeatureController@destroy');

	Route::resource('rating','RatingController');
	Route::get('/rating/delete/{id}', 'RatingController@destroy');
});

