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
Route::post('/posts','PostController@store');



Route::resource('/users', 'UsersController', ['only' => ['show']]);
Route::post('/serch','UsersController@serch');
Route::get('/serchpage','UsersController@serchpage');

Route::get('/data','DataController@index');
Route::get('/rankpage','DataController@rankpage');
Route::post('/rankkinds','DataController@show');


Route::resource('/mypage', 'MypageController', ['only' => ['index']]);
Route::get('/edit','MypageController@edit');
Route::put('/update','MypageController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


