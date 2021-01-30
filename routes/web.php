<?php

/*
|--------------------------------------------------------------------------
| headerからの遷移
|--------------------------------------------------------------------------
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
//UserController内destroyメソッドのredirectにて使用中
Route::get('/logout', function () {
    return view('front/before_login');
})->name('top');


/*
|--------------------------------------------------------------------------
| 情報修正ボタンからの遷移と更新処理
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
Route::get('/no-product', function () {
    return view('products/no_product');
})->name('noProduct');
Route::get('productInfo/{id}', 'ProductController@show')->name('product.show');

/*
|--------------------------------------------------------------------------
| カート内商品関連
|--------------------------------------------------------------------------
*/
Route::get('/noCartList', function () {
    return view('products/no_cart_list');
})->name('noCartlist');

Route::resource('cartlist', 'ProductController', ['only' => ['index']]);
Route::post('productInfo/cartListRemove', 'ProductController@remove')->name('itemRemove');
Route::post('productInfo/addcart','ProductController@addCart')->name('addcart.post');