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

Route::get('/', function () {
    return view('front/before_login');
});
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/logout', function () {
    return view('front/before_login');
});

//ユーザ登録
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

//認証系のルーティング
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//商品詳細
Route::resource('cartlist', 'ProductController', ['only' => ['index']]);
Route::get('prodinfo/{id}', 'ProductController@show')->name('prodinfo.show');
Route::post('prodinfo/addcart','ProductController@addCart')->name('addcart.post');
