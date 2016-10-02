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
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/topic/show/{topic}', ['as' => 'topic', 'uses' => 'TopicController@show']);

Route::group(['middleware' => ['auth']], function() {
	// Topic
	Route::get('/topic/new', 'TopicController@new');
	Route::post('/topic/create', 'TopicController@create');
	Route::get('/topic/edit/{topic}', 'TopicController@edit');
	Route::post('/topic/update/{topic}', 'TopicController@update');
	Route::get('/topic/delete/{topic}', 'TopicController@delete');
});
