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
    Route::get('/admin/new-category', 'AdminController@newCategory');
    Route::post('/admin/new-category', 'AdminController@saveNewCategory');
    Route::get('/admin/new-picture', 'AdminController@newPicture');
    Route::post('/admin/new-picture', 'AdminController@saveNewPicture');
    Route::get('/', 'HomeController@index');
});
