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


Route::get('/coupon/types/{page}/{size}','Backend\CouponTypeController@couponTypes');
Route::post('/coupon/type','Backend\CouponTypeController@couponTypeStore');
Route::delete('/coupon/type/{id}','Backend\CouponTypeController@couponTypeDestroy');
Route::put('/coupon/type/{id}','Backend\CouponTypeController@couponTypeUpdate');

Route::resource('test','Backend\ArticleController');