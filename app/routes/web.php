<?php
use App\Http\Controllers\PostController;
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

Route::resource('posts', 'PostController');

Route::get('/', 'PostController@index')->name('home');

//ログイン中のユーザーのみアクセス可能
Route::group(['middleware' => ['auth']], function () {
    //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
    Route::post('ajaxlike', 'PostController@ajaxlike')->name('posts.ajaxlike');
});


Route::get('/search','PostController@search')->name('search');


// マイページ
Route::get('/my_page','PostController@my_pageData')->name('my_page.data');
Route::get('/other/{id}','PostController@otherData')->name('other.data');

// 一般
Route::group(['middleware' => 'can:user-higher'], function () {
    // 投稿一覧
    Route::get('/post_list','PostController@postList')->name('post.list');
    Route::get('/post_list/{id}','PostController@users_postList')->name('users_post.list');
    // アカウント情報
    Route::get('/account_info','DisplayController@accountData')->name('account.data');
    // アカウント編集
    Route::get('/account/account_edit','DisplayController@accountEditForm')->name('account.edit');
    Route::post('/account/account_edit','DisplayController@accountEdit')->name('edit.post');
    // アカウント削除
    Route::get('/account/account_delete','DisplayController@accountDelete')->name('account.delete');
    // Route::get('/spend/{spending}/flg',[RegistrationController::class, 'spendFlg'])->name('spend.flg');
    // いいね欄
    Route::get('/like/{id}','DisplayController@like')->name('like');
    //コメント投稿処理
    Route::post('/posts/{comment_id}/comments','CommentsController@store')->name('comment');
    //コメント削除処理
    Route::delete('/comment_delete','CommentsController@commentDelete')->name('comment.delete');
});

// 管理者
Route::group(['middleware' => 'can:admin-only'], function () {
    // 管理者ページ
    Route::get('/admin', 'AdminController@index')->name('admin');
    // 管理者ユーザー検索ページ
    Route::get('/admin/admin_user', 'AdminController@adminUser')->name('admin.user');
    // 管理者投稿検索ページ
    Route::get('/admin/admin_post', 'AdminController@adminPost')->name('admin.post');
    // ユーザーページ
    Route::get('/user_page/{id}','AdminController@user_pageData')->name('user_page.data');
    // ユーザーページ削除
    Route::get('/user_delete/{id}','AdminController@user_pageDelete')->name('user_page.delete');
    // 管理者　登録削除
    Route::get('/user_post/{id}','AdminController@user_postDelete')->name('user_post.delete');
});
