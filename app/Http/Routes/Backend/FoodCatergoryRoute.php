<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

/* 地区路由 */
class FoodCatergoryRoute
{
    public function map(Registrar $router)
    {
        $router->post('/food/category','FoodCategoryController@store');
        $router->get('/food/category/{id}','FoodCategoryController@show');
        $router->get('/food/category','FoodCategoryController@index');
    }
}


