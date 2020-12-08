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
    return view('front/after_login');
});
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/product_search', function () {
    return view('shopping/product_search');
});
Route::get('/cart', function () {
    return view('shopping/cart');
});
Route::get('/order_history', function () {
    return view('shopping/order_history');
});
Route::get('/user_info', function () {
    return view('users/user_info');
});
Route::get('/logout', function () {
    return view('front/before_login');
});

