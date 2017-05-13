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

Route::get('/', 'HomeController@index')->name('home');

/* ~~[ProductController]~~*/
Route::get('products','ProductsController@index')->name('product.list');
Route::get('products/{productId}','ProductsController@show')->name('product.show');

/* ~~[CartController]~~*/
Route::get('cart','CartController@index')->name('cart');
Route::get('cart/{productId}/{quantity}','CartController@add')->name('cart.add');
Route::put('cart/{productId}','CartController@putCartItem')->name('cart.update');
Route::delete('cart/{productId}','CartController@deleteCartItem')->name('cart.delete');

/* ~~[OrderController]~~*/
Route::get('order','OrderController@index')->name('order.index');
Route::post('order','OrderController@placeOrder')->name('order.place-order');
Route::get('order/{hashOrderId}','OrderController@show')->name('order.show');

/**
 * @description : Used for internal api request;
 * @route(/api/*);
 * */
Route::group(['prefix'=>'api'],function(){
    Route::get('payment/token.json','PaymentController@token')->name('payment.token.json');
});

//Auth::routes();


