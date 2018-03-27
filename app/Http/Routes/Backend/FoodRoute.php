<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 食物路由 */
class FoodRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/food','FoodController');
        $router->get('/foods','FoodController@getFoodsAll');
    }
}


