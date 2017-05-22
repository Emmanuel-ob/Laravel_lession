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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
      
      Route::get('/', 'WorkController@index');
      Route::get('/articles', 'WorkController@index');
      Route::post('/articles/new', 'WorkController@create');
      #Route::get('/articles/{id}', 'WorkController@index');
      #Route::get('/articles/{id}', 'WorkController@index');
      Route::get('/articles/{id}/edit', 'WorkController@edit');
      Route::post('/articles/{id}/update', 'WorkController@update');
      Route::get('/articles/{id}/delete', 'WorkController@destroy');
});
