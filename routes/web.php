<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/ecwid/checkout/payment','App\Http\Controllers\CheckoutController@paymentEcwid');
Route::get('/ecwid/response/{storeId}/{orderNumber}/{callback?}/', 'App\Http\Controllers\CheckoutController@responseEcwid');
Route::post('/ecwid/confirm/{storeId}/{orderNumber}/{callbackPayload}/', 'App\Http\Controllers\CheckoutController@updatePaymentEcwid');

Route::post('/site/checkout/payment','App\Http\Controllers\CheckoutController@paymentSitePro');


Route::get('/home','App\Http\Controllers\CheckoutController@home');