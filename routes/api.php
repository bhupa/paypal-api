<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/articles', 'ArticleController@store')->name('articles.store');
Route::get( 'addmoney/paywithpaypal', 'PaymentController@payWithPaypal')->name('addmoney.paywithpaypal');
Route::post( 'addmoney/paypal','PaymentController@postPaymentWithpaypal')->name('addmoney.paypal');
Route::get('payment/status', 'PaymentController@getPaymentStatus')->name('payment.status');
