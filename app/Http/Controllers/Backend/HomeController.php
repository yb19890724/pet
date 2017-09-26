<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

/* 后台登录控制器 */

class HomeController extends BackendController
{

    public function index(){
        return view('backend.home');
    }
}