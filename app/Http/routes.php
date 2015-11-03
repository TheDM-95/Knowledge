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

Route::get('auth/facebook', [
	'as' => 'auth.facebook',
	'uses' => 'Auth\AuthController@redirectToProvider'
	]);
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

// Authentication routes...
Route::get('auth/login', [
	'as' => 'auth.login',
	'uses' => 'Auth\AuthController@getLogin']);

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', [
	'as' => 'auth.logout',
	'uses' => 'Auth\AuthController@getLogout'
	]);

// Registration routes...
Route::get('auth/register', [
	'as' => 'auth.register',
	'uses' => 'Auth\AuthController@getRegister'
	]);

Route::post('auth/register', [
	'as' => 'auth.register',
	'uses' => 'Auth\AuthController@postRegister'
	]);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
	]);


Route::get('/', 'PagesController@index');


Route::get('/admin', 'PagesController@admin');


Route::get('/pages', [
    'as' => 'pages.index',
    'uses' => 'PagesController@index'
]);

get('/leaderboard', [
	'as' => 'pages.leaderboard',
	'uses' => 'PagesController@leaderboard'
	]);

get('/users/{user_name}', [
	'as' => 'user.show',
	'uses' => 'UsersController@show'
	]);

get('/users/{user_name}/getuserdata', [
	'as' => 'user.getuserdata',
	'uses' => 'UsersController@getuserdata'
	]);


post('/users/{user_name}/editaccount', [
	'as' => 'user.edit',
	'uses' => 'UsersController@edit'
	]);

Route::group(['middleware' => 'auth'], function() {
	get('/myaccount', [
		'as' => 'user.profile',
		'uses' => 'UsersController@show'
		]);
	get('/category/{id}/getquestions', [
		'as' => 'category.getquestions',
		'uses' => 'QuestionsController@getquestion'
		]);
	get('/post/{id}/{score}', [
		'as' => 'users.updateScore',
		'uses' => 'UsersController@updateScore'
		]);


	post('/postupdate', [
		'as' => 'users.postupdateScore',
		'uses' => 'UsersController@postupdateScore'
		]);
	post('/postupdatequestion', [
		'as' => 'userdetails.create',
		'uses' => 'UserdetailsController@create'
		]);

	get('/getallcategories', [
		'uses' => 'CategoriesController@getall'
		]);

	get('/category/{id}', [
		'as' => 'pages.category',
		'uses' => 'PagesController@category'
		]);
});