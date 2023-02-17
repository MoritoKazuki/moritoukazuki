<?php
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\DisplayController;

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
// パスリセ
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::resource('photos', 'PhotoController');

Route::get('/', 'PhotoController@index')->name('home');
// マイページ
Route::get('/my_page','PhotoController@my_pageData')->name('my_page.data');
// 投稿一覧
Route::get('/my_page/post_list','PhotoController@postList')->name('post.list');
// アカウント情報
Route::get('/my_page/account','DisplayController@accountData')->name('account.data');
// アカウント編集
Route::get('/account/account_edit','DisplayController@accountEditForm')->name('account.edit');
Route::post('/account/account_edit','DisplayController@accountEdit')->name('edit.post');

// Route::get('/edit_form/{spending}',[RegistrationController::class, 'editSpendForm'])->name('edit.spend');
// Route::post('/edit_form/{spending}',[RegistrationController::class, 'spendEdit'])->name('edit.post');

// 投稿削除

// アカウント情報







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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
