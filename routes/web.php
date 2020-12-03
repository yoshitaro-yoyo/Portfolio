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
Route::get('/user_regist', function () {
    return view('○○/user_regist');
});
Route::get('/login', function () {
    return view('○○/login');
});
Route::get('/item_search', function () {
    return view('○○/item_search');
});
Route::get('/list_in_cart', function () {
    return view('○○/list_in_cart');
});
Route::get('/order_history', function () {
    return view('○○/order_history');
});
Route::get('/user_info', function () {
    return view('○○/user_info');
});
Route::get('/logout', function () {
    return view('○○/logout');
});

