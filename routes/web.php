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

Route::get('/', 'IndexController@index');
Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/{slug}', 'ArticlesController@view');
Route::post('/articles/{id}/comment', 'CommentController@submitcomment');
