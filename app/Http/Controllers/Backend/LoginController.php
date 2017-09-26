<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/* 后台登录控制器 */

class LoginController extends BackendController
{
    use AuthenticatesUsers;
    private $loginView="backend.login";//登录视图
}