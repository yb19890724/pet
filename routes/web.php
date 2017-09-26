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
    return view('welcome');
});

//后台管理员登录接口
Route::get('/backend/login','Backend\LoginController@showLoginForm');

Route::get('/backend/{path?}','Backend\HomeController@index')->where('path', '[\/\w\.-]*');
