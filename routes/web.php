<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::pattern('topic', '[0-9]+');
Route::pattern('user', '[0-9]+');

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/topic/{topic}', ['as' => 'topic', 'uses' => 'TopicController@show']);

Route::group(['middleware' => ['auth']], function() {
	// User
	Route::get('/user/{user}/edit', 'UserController@edit');
	Route::post('/user/{user}/update', 'UserController@update');

	// Topic
	Route::get('/topic/new', 'TopicController@new');
	Route::post('/topic/create', 'TopicController@create');
	Route::get('/topic/{topic}/edit', 'TopicController@edit');
	Route::post('/topic/{topic}/update', 'TopicController@update');
	Route::get('/topic/{topic}/delete', 'TopicController@delete');
});
