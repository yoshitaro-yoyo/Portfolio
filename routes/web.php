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

Route::get('/', 'UserController@index')->name('top');

/*
|--------------------------------------------------------------------------
| headerからの遷移
|--------------------------------------------------------------------------
*/

Route::get('/logout', function () {
    return view('front/before_login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| 情報修正ボタンからの遷移と更新処理
|--------------------------------------------------------------------------
*/

Route::resource('users', 'UserController', ['only' =>['show', 'edit', 'update', 'destroy']]);
/*Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController', ['only' =>['show', 'edit', 'update', 'destroy']]);
});*/
//ログイン認証を通ったユーザのみが、この内部ルーティングにアクセスできる
