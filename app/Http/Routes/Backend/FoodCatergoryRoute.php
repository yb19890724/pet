<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 地区路由 */
class FoodCatergoryRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/food/category','FoodCategoryController');
        $router->get('/food/categories','FoodCategoryController@getFoodCategoryAll');
    }
}


