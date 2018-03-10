<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 食物分类路由 */
class FoodCatergoryRoute
{
    public function map(Registrar $router)
    {
        $router->resource('/food/category','FoodCategoryController');
        $router->get('/food/categories','FoodCategoryController@getFoodCategoryAll');
    }
}


