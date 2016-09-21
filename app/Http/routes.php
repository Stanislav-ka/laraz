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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('user/{id}',[
    'middleware' => 'auth',
    'uses' => 'UserController@showProfile'
]);

Route::get('user/{id}/edit',[
    'middleware' => 'auth',
    'uses' => 'UserController@showEditProfile'
]);

Route::get('users',[
    'middleware' => 'auth',
    'uses' => 'UserController@ListUsers'
]);

Route::get('posts',[
    'middleware' => 'auth',
    'uses' => 'PostController@index'
]);

Route::get('post/{id}',[
    'middleware' => 'auth',
    'uses' => 'PostController@show'
]);

Route::get('posts/new',[
    'middleware' => 'auth',
    'uses' => 'PostController@create'
]);

Route::post('posts/add','PostController@store');

Route::post('user/{id}/save',[
    'middleware' => 'auth',
    'uses' => 'UserController@update'
]);

