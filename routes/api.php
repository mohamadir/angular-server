<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/blogs','BlogController@getBlogs');
Route::get('/blogs/{id}','BlogController@getBlog');
Route::post('/blogs','BlogController@addBlog');
Route::get('/blogs/remove/{id}','BlogController@removeBlog');


Route::post('/users/login','UserController@login');
Route::post('/users','UserController@addUser');


Route::get('/users','UserController@getUsers');



