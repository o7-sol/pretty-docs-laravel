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

Route::get('/', 'DocsController@displayAll');
Route::get('/by-clicks', 'DocsController@sortByClicks');
//Show document
Route::get('/{hash}/{id}', 'DocsController@showDocument');

//Upload document
Route::post('/upload-document', 'DocsController@uploadDocument');

// Login
Auth::routes();

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@login']);
Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('/register', 'Auth\RegisterController@register');

//MyDocs
Route::get('/user/{name}/docs', 'DocsController@userDocs');
//PrivateDocs
Route::get('/user/{name}/private-docs', 'DocsController@userPrivateDocs');
//DeleteDocs
Route::get('/delete/doc/{id}', 'DocsController@deleteDoc');
//Admin
Route::get('/delete/doc/as-admin/{id}', 'AdminController@deleteDoc');

//test
Route::get('/docs', 'DocsController@displayAll');
