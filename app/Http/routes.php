<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/remove/{id}', 'AdminController@removePost');
    Route::get('/admin/edit/{id}', 'AdminController@getEditPost');
    Route::post('/admin/edit/{id}', 'AdminController@postEditPost');
    Route::get('/', 'PostController@index');
    Route::get('/posts/new', 'PostController@getNewPost');
    Route::post('/posts/new', 'PostController@postNewPost');
});
