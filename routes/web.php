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

Route::get('/','PostController@index');
Route::get('/posts/show/{post}','PostController@show');
Route::get('/posts/create','PostController@create');

Route::resource('/users', 'UsersController', ['only' => ['show']]);
// Route::resource('/mypage/{id}', 'MypageController', ['only' => ['show']]);

Route::post('/posts','PostController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


