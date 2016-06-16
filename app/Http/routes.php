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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::auth();

// Application Routes...
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
//Route::get('/', 'HomeController@newsFeed');
Route::get('/myJournal', 'HomeController@myJournal');
Route::get('/journal/{id}', 'HomeController@getJournal');
Route::post('/post', 'UserController@post');