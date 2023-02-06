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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Route::get('', 'AccountController@index')->name('account.index');

Route::get('/post/{id}/detail',['HomeController@index', 'postDetail'])->name('post.detail');

// 一般ユーザー
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    //ここにルートを記述
  });

// 管理者ユーザー
Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    Route::get('account', 'AccountController@index')->name('account.index');
});
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    //ここにルートを記述
  });