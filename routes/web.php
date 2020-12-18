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

Route::get('/', function () {
    return view('front/after_login');
});
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');


/*
|--------------------------------------------------------------------------
| 情報修正ボタンからの遷移と更新処理
|--------------------------------------------------------------------------
*/

Route::resource('users', 'UserController', ['only' =>['show', 'edit', 'update', 'destroy']]);

//ログイン認証を通ったユーザのみが、この内部ルーティングにアクセスできる
/*Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController', ['only' =>['show', 'edit', 'update', 'destroy']]);
});*/

/*
|--------------------------------------------------------------------------
| ユーザ登録
|--------------------------------------------------------------------------
*/
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');
