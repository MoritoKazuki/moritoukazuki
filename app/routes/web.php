<?php
use App\Http\Controllers\PhotoController;

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

Route::resource('photos', 'PhotoController');

Route::get('/', 'PhotoController@index')->name('home');
// マイページ
Route::get('/account','PhotoController@accountData')->name('account.data');
// 新規投稿
// Route::get('/new_post','PhotoController@create')->name('new.post');
// Route::post('/new_post','PhotoController@store');





// 一般ユーザー
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    //ここにルートを記述
  });

// 管理者ユーザー
// Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
//     Route::get('account', 'AccountController@index')->name('account.index');
// });
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    //ここにルートを記述
  });

  //パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
