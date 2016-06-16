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

Route::get('/', "BaseController@index");

/* Dashboard Routes */
Route::get('/dashboard', "Dashboard\DashboardController@index");

/* API ROUTES AUTHORS */
Route::get('/api/authors/get', "Api\AuthorController@get");
Route::get('/api/author/get/{id}', "Api\AuthorController@one");
Route::put('/api/author/create', "Api\AuthorController@create");
Route::patch('/api/author/update', "Api\AuthorController@update");
Route::delete('/api/author/delete/{id}', "Api\AuthorController@delete");

/* API ROUTES BOOKS */
Route::get('/api/books/get', "Api\BookController@get");
Route::get('/api/book/get/{id}', "Api\BookController@one");
Route::put('/api/book/create', "Api\BookController@create");
Route::patch('/api/book/update', "Api\BookController@update");
Route::get('/api/book/status', "Api\BookController@status");
Route::delete('/api/book/delete/{id}', "Api\BookController@delete");
Route::delete('/api/book/img/delete/{link}', "Api\BookController@deleteimage");

Route::auth();

