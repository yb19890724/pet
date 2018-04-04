<?php

//加载后台接口对应路由
Route::group(['namespace'=>'Backend','middleware'=>['backend.auth']],function($router){
    foreach (glob(app_path('Http//Routes//Backend') . '/*.php') as $file) {
        app()->make('App\\Http\\Routes\\Backend\\'.basename($file, '.php'))->map($router);
    }
});