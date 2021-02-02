<?php

/*
|--------------------------------------------------------------------------
| headerからの遷移
|--------------------------------------------------------------------------
*/
//ルートロードの最適化時、クロージャはシリアライズ不可のためviewメソッド使用
Route::view('/', 'front/before_login');
Route::view('/login', 'auth/login');
Route::view('/register', 'auth/register');
//UserController内destroyメソッドのredirectにて使用中
Route::view('/logout', 'front/before_login')->name('top');

/*
|--------------------------------------------------------------------------
| 情報修正ボタンからの遷移と更新処理、及びミドルウエア使用ルーティング
|--------------------------------------------------------------------------
*/

//ログイン認証を通ったユーザのみが、この内部ルーティングにアクセスできる.
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController', ['only' =>['show', 'edit', 'update', 'destroy']]);
    Route::resource('orders', 'OrdersController', ['only' =>['index']]);
    Route::resource('searchOrders', 'OrdersController', ['only' =>['show']]);
    Route::resource('orderDetails', 'OrderDetailsController', ['only' =>['show','edit']]);
    Route::get('product_search', 'ProductController@search')->name('product_search');
});

/*
|--------------------------------------------------------------------------
| ユーザ登録
|--------------------------------------------------------------------------
*/
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

/*
|--------------------------------------------------------------------------
| 認証系のルーティング
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| 商品詳細関連
|--------------------------------------------------------------------------
*/
Route::view('/no-product', 'products/no_product')->name('noProduct');
Route::get('productInfo/{id}', 'ProductController@show')->name('product.show');
Route::get('/prodinfo/{id}', 'ProductController@show')->name('prodinfo');

/*
|--------------------------------------------------------------------------
| カート内商品関連
|--------------------------------------------------------------------------
*/
Route::view('/no-cartList', 'products/no_cart_list')->name('noCartlist');
Route::view('/purchaseCompleted', 'products/purchase_completed');

Route::resource('cartlist', 'ProductController', ['only' => ['index']]);
Route::post('productInfo/addCart/cartListRemove', 'ProductController@remove')->name('itemRemove');
Route::post('productInfo/addCart','ProductController@addCart')->name('addcart.post');
Route::post('productInfo/addCart/orderFinalize','ProductController@store')->name('orderFinalize');
