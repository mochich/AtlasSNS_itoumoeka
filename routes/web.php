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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@registerForm');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/index', 'PostsController@index')->middleware('auth');

Route::post('/post', 'PostsController@create')->middleware('auth');
Route::get('/post', 'PostsController@create')->middleware('auth');
//相手プロフィールに飛ぶ
Route::get('/users/{id}/profile', 'UsersController@profile')->middleware('auth');
//自分プロフィールに飛ぶ
Route::get('/users/profile', 'UsersController@updateForm')->middleware('auth');
//プロフィールを更新する
Route::get('/update', 'UsersController@update')->middleware('auth');
Route::post('/update', 'UsersController@update')->middleware('auth');
Route::put('/update', 'UsersController@update')->middleware('auth');

Route::get('/search', 'UsersController@search')->middleware('auth');
Route::post('/search', 'UsersController@search')->middleware('auth');

Route::get('/followList', 'FollowsController@followList')->middleware('auth');
Route::get('/followerList', 'FollowsController@followerList')->middleware('auth');




//ログアウト
Route::get('/logout', 'Auth\LoginController@logout');

// post更新
Route::post('/post/update', 'PostsController@update');

// DELETEーGET送信
Route::get('/post/{id}/delete', 'PostsController@delete');

// フォロー機能
Route::post('/follow', 'FollowsController@follow');
Route::post('/unfollow', 'FollowsController@unfollow');
